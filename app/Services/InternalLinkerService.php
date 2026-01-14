<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Str;

/**
 * Service to automatically link keywords to relevant blog posts.
 */
final class InternalLinkerService
{
    /**
     * Linkify content using an existing DOMDocument.
     */
    public function linkifyWithDom(\DOMDocument $dom, int $excludePostId): void
    {
        $posts = Post::published()
            ->where('id', '!=', $excludePostId)
            ->select('title', 'slug')
            ->get();

        if ($posts->isEmpty()) {
            return;
        }

        $sortedPosts = $posts->sortByDesc(fn($post) => strlen($post->title));
        $xpath = new \DOMXPath($dom);

        foreach ($sortedPosts as $post) {
            $this->applyLinkToDom($dom, $xpath, $post->title, route('blog.show', $post->slug));
        }
    }

    /**
     * Apply link to a specific text in DOM.
     */
    private function applyLinkToDom(\DOMDocument $dom, \DOMXPath $xpath, string $text, string $url): void
    {
        // Find text nodes that are not inside <a>, <h1>..<h6> (to avoid linking headers)
        $textNodes = $xpath->query("//text()[not(ancestor::a) and not(ancestor::h1) and not(ancestor::h2) and not(ancestor::h3) and not(ancestor::h4) and not(ancestor::h5) and not(ancestor::h6)]");
        
        $replacementMade = false;
        $quotedText = preg_quote($text, '/');
        $pattern = "/\b($quotedText)\b/i";

        foreach ($textNodes as $node) {
            if ($replacementMade) break;

            $nodeValue = $node->nodeValue;
            if (preg_match($pattern, $nodeValue)) {
                $parts = preg_split($pattern, $nodeValue, 2, PREG_SPLIT_DELIM_CAPTURE);
                
                $fragment = $dom->createDocumentFragment();
                $fragment->appendChild($dom->createTextNode($parts[0]));
                
                $link = $dom->createElement('a', htmlspecialchars($parts[1]));
                $link->setAttribute('href', $url);
                $link->setAttribute('class', 'text-blue-600 font-bold hover:underline');
                $fragment->appendChild($link);
                
                $fragment->appendChild($dom->createTextNode($parts[2]));
                
                $node->parentNode->replaceChild($fragment, $node);
                $replacementMade = true;
            }
        }
    }

    /**
     * Legacy method for simple string input.
     */
    public function linkify(string $content, int $excludePostId): string
    {
        if (empty($content)) return '';

        $dom = new \DOMDocument();
        @$dom->loadHTML('<?xml encoding="UTF-8"><div>' . $content . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $this->linkifyWithDom($dom, $excludePostId);

        $wrapper = $dom->getElementsByTagName('div')->item(0);
        $result = '';
        foreach ($wrapper->childNodes as $child) {
            $result .= $dom->saveHTML($child);
        }
        
        return $result;
    }

    /**
     * Inject "Baca Juga" (Read Also) blocks between paragraphs.
     * Prioritizes: 1. Keyword overlap in title, 2. Same category, 3. Random fallback.
     */
    public function injectRelatedBlocks(\DOMDocument $dom, Post $currentPost): void
    {
        // 1. Get Keywords from current title (remove short words)
        $words = explode(' ', $currentPost->title);
        $keywords = array_filter($words, fn($w) => strlen($w) > 3);
        
        $relatedByKeywordIds = collect();
        if (!empty($keywords)) {
            $relatedByKeywordIds = Post::published()
                ->where('id', '!=', $currentPost->id)
                ->where(function($query) use ($keywords) {
                    foreach ($keywords as $word) {
                        $query->orWhere('title', 'LIKE', '%' . $word . '%');
                    }
                })
                ->limit(5)
                ->pluck('id');
        }

        // 2. Combine with same category prioritization
        $posts = Post::published()
            ->where('id', '!=', $currentPost->id)
            ->where(function($query) use ($currentPost, $relatedByKeywordIds) {
                if ($relatedByKeywordIds->isNotEmpty()) {
                    $query->whereIn('id', $relatedByKeywordIds);
                }
                $query->orWhere('category_id', $currentPost->category_id);
            })
            ->orderByRaw('CASE WHEN category_id = ? THEN 1 ELSE 2 END', [$currentPost->category_id])
            ->inRandomOrder()
            ->take(5)
            ->get();

        // 3. If still less than 5, fill with random published posts
        if ($posts->count() < 5) {
            $excludedIds = $posts->pluck('id')->push($currentPost->id)->toArray();
            $morePosts = Post::published()
                ->whereNotIn('id', $excludedIds)
                ->inRandomOrder()
                ->take(5 - $posts->count())
                ->get();
            
            $posts = $posts->concat($morePosts);
        }

        if ($posts->isEmpty()) {
            return;
        }

        $xpath = new \DOMXPath($dom);
        $paragraphs = $xpath->query("//p");
        $totalP = $paragraphs->length;
        
        if ($totalP < 6) {
            return; // Not enough content for smart placement
        }

        // Dynamically determine insert indexes with a wider gap (at least every 8-10 paragraphs)
        $insertIndexes = [];
        if ($totalP >= 6) {
            $insertIndexes[] = 4; // After 5th paragraph
        }
        if ($totalP >= 18) {
            $insertIndexes[] = 14; // After 15th paragraph (gap of 10)
        }

        $insertedCount = 0;

        foreach ($insertIndexes as $idx) {
            if ($insertedCount >= 2 || $idx >= $totalP || $insertedCount >= $posts->count()) {
                break;
            }

            $currentP = $paragraphs->item($idx);
            $post = $posts[$insertedCount];
            
            // Create "Baca Juga" block
            $div = $dom->createElement('div');
            $div->setAttribute('class', 'my-8 p-6 bg-slate-50 rounded-2xl border-l-4 border-blue-600 flex items-center gap-4 group not-prose');
            
            $icon = $dom->createElement('div');
            $icon->setAttribute('class', 'w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0');
            
            $i = $dom->createElement('i');
            $i->setAttribute('class', 'fa-solid fa-book-open text-sm');
            $icon->appendChild($i);
            $div->appendChild($icon);

            $textContainer = $dom->createElement('div');
            
            $label = $dom->createElement('span', 'BACA JUGA:');
            $label->setAttribute('class', 'block text-[10px] font-black text-blue-600 uppercase tracking-widest mb-1');
            $textContainer->appendChild($label);

            $link = $dom->createElement('a', htmlspecialchars($post->title));
            $link->setAttribute('href', route('blog.show', $post->slug));
            $link->setAttribute('class', 'text-slate-900 font-bold hover:text-blue-600 transition-colors leading-tight');
            $textContainer->appendChild($link);
            
            $div->appendChild($textContainer);

            // Insert after current paragraph
            if ($currentP->nextSibling) {
                $currentP->parentNode->insertBefore($div, $currentP->nextSibling);
            } else {
                $currentP->parentNode->appendChild($div);
            }

            $insertedCount++;
        }
    }
}
