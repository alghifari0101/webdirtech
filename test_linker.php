<?php

require __DIR__ . '/vendor/autoload.php';

// Mock Post class or its behavior
// Since we can't easily mock the static call in a standalone script without a full framework boot 
// that might fail on DB, let's just create a dummy InternalLinkerService for testing purposes 
// or test the logic by extracting the method.

class InternalLinkerServiceTestable {
    public function linkifyWithDom(\DOMDocument $dom, array $posts): void
    {
        $sortedPosts = collect($posts)->sortByDesc(fn($post) => strlen($post['title']));
        $xpath = new \DOMXPath($dom);

        foreach ($sortedPosts as $post) {
            $this->applyLinkToDom($dom, $xpath, $post['title'], '/blog/' . $post['slug']);
        }
    }

    private function applyLinkToDom(\DOMDocument $dom, \DOMXPath $xpath, string $text, string $url): void
    {
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
}

$service = new InternalLinkerServiceTestable();
$posts = [
    ['title' => 'Laravel 12', 'slug' => 'laravel-12'],
    ['title' => 'Vite', 'slug' => 'vite-setup'],
    ['title' => 'Tailwind CSS', 'slug' => 'tailwind-tips']
];

$content = "
<h2>Welcome to Laravel 12 guide</h2>
<p>In this article, we will talk about Laravel 12 and Vite.</p>
<p>Already linked: <a href='#'>Laravel 12</a> should be ignored.</p>
<p>Check out our Tailwind CSS tutorial.</p>
";

$dom = new \DOMDocument();
@$dom->loadHTML('<?xml encoding="UTF-8"><div>' . $content . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

$service->linkifyWithDom($dom, $posts);

$wrapper = $dom->getElementsByTagName('div')->item(0);
echo $dom->saveHTML($wrapper);
