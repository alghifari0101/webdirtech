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
}
