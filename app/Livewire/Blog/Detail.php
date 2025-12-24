<?php

declare(strict_types=1);

namespace App\Livewire\Blog;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Public Blog Detail component.
 */
final class Detail extends Component
{
    public Post $post;

    /**
     * Initialize the component.
     */
    public function mount(Post $post): void
    {
        if (!$post->is_published || ($post->published_at && $post->published_at->isFuture())) {
            abort(404);
        }
        $this->post = $post;
    }

    /**
     * Render the component view.
     */
    public function render(): View
    {
        $relatedPosts = Post::where('category_id', $this->post->category_id)
            ->where('id', '!=', $this->post->id)
            ->published()
            ->latest()
            ->take(3)
            ->get();

        $processedContent = $this->post->content;
        $toc = [];

        if ($processedContent) {
            $tocData = $this->generateTocAndProcessedContent($processedContent);
            $processedContent = $tocData['content'];
            $toc = $tocData['toc'];
        }

        $categories = Category::withCount('posts')->get();
        $recentPosts = Post::where('id', '!=', $this->post->id)
            ->published()
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.blog.detail', [
            'relatedPosts' => $relatedPosts,
            'toc' => $toc,
            'processedContent' => $processedContent,
            'categories' => $categories,
            'recentPosts' => $recentPosts
        ])->layoutData([
            'title' => $this->post->title . ' | Dirtech Blog',
            'description' => $this->post->excerpt ?: Str::limit(strip_tags($this->post->content), 160),
            'ogType' => 'article',
            'ogImage' => $this->post->featured_image ? storage_url($this->post->featured_image) : 'img/og-blog.png',
            'schema' => $this->getCombinedSchema()
        ]);
    }

    /**
     * Generate TOC and inject IDs into headers.
     */
    private function generateTocAndProcessedContent(string $content): array
    {
        $dom = new \DOMDocument();
        // Use mb_convert_encoding to handle UTF-8 properly
        @$dom->loadHTML('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $xpath = new \DOMXPath($dom);
        $headers = $xpath->query('//h2|//h3');
        
        $toc = [];
        foreach ($headers as $header) {
            $text = trim($header->nodeValue);
            $id = Str::slug($text);
            
            // Ensure unique ID
            $originalId = $id;
            $counter = 1;
            while ($xpath->query("//*[@id='$id']")->length > 0) {
                $id = $originalId . '-' . $counter++;
            }
            
            $header->setAttribute('id', $id);
            
            $toc[] = [
                'level' => (int) substr($header->tagName, 1),
                'text' => $text,
                'id' => $id
            ];
        }
        
        return [
            'toc' => $toc,
            'content' => $dom->saveHTML()
        ];
    }

    /**
     * Combine Article and FAQPage schema.
     */
    private function getCombinedSchema(): array
    {
        $articleSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $this->post->title,
            'image' => $this->post->featured_image ? storage_url($this->post->featured_image) : asset('img/og-blog.png'),
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Dirtech Solutions',
                'logo' => asset('img/logo-dirtech.png')
            ],
            'datePublished' => $this->post->published_at->toIso8601String(),
            'author' => [
                '@type' => 'Organization',
                'name' => 'Tim Editorial Dirtech'
            ]
        ];

        $faqs = $this->extractFaqs();

        if (empty($faqs)) {
            return $articleSchema;
        }

        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq['answer']
                    ]
                ];
            }, $faqs)
        ];

        return [
            '@context' => 'https://schema.org',
            '@graph' => [
                $articleSchema,
                $faqSchema
            ]
        ];
    }

    /**
     * Extract FAQ from content based on headers ending with '?'.
     */
    private function extractFaqs(): array
    {
        if (empty($this->post->content)) {
            return [];
        }

        $dom = new \DOMDocument();
        // Use mb_convert_encoding to handle UTF-8 properly
        @$dom->loadHTML('<?xml encoding="UTF-8">' . $this->post->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $xpath = new \DOMXPath($dom);
        // Query all header tags in document order
        $elements = $xpath->query('//h1|//h2|//h3|//h4|//h5|//h6');
        
        $faqs = [];
        $headerTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
        $faqStarted = false;
        
        foreach ($elements as $element) {
            $text = trim($element->nodeValue);
            
            // Check for the FAQ marker if not started yet
            if (!$faqStarted) {
                if (Str::contains(strtolower($text), 'faq')) {
                    $faqStarted = true;
                }
                continue; // Skip the marker header itself and anything before it
            }

            // Once started, collect headers ending with '?'
            if (Str::endsWith($text, '?')) {
                // Try to find the answer in following siblings
                $answer = '';
                $sibling = $element->nextSibling;
                while ($sibling) {
                    if ($sibling->nodeType === XML_ELEMENT_NODE) {
                        if (in_array(strtolower($sibling->tagName), $headerTags)) {
                            break; // Next question or different section
                        }
                        $answer .= $dom->saveHTML($sibling);
                        if (strlen(strip_tags($answer)) > 150) {
                            break; // Stop after enough content
                        }
                    }
                    $sibling = $sibling->nextSibling;
                }
                
                if (!empty(trim(strip_tags($answer)))) {
                    $faqs[] = [
                        'question' => $text,
                        'answer' => trim(strip_tags($answer))
                    ];
                }
            }
        }
        
        return $faqs;
    }
}
