<?php

return [
    'encoding'      => 'UTF-8',
    'finalize'      => true,
    'cachePath'     => storage_path('app/purifier'),
    'cacheFileMode' => 0755,
    'settings'      => [
        'default' => [
            'HTML.Doctype'             => 'HTML 4.01 Transitional',
            'HTML.Allowed'             => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,a[href|title|target|rel],ul,ol,li,p[style|class],br,span[style|class],img[width|height|alt|src|style|class],blockquote,pre,code,div[style|class],iframe[src|width|height|frameborder|allowfullscreen|style|class|title]',
            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align,width,height,margin,margin-left,margin-right,margin-top,margin-bottom,border',
            'AutoFormat.AutoParagraph' => false,
            'AutoFormat.RemoveEmpty'   => true,
            'HTML.SafeIframe'          => true,
            'URI.SafeIframeRegexp'     => '%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/|www.google.com/maps/embed)%',
            'HTML.DefinitionID'        => 'html5-definitions',
            'HTML.DefinitionRev'       => 1,
        ],
        'test'    => [
            'Attr.EnableID' => 'true',
        ],
        'youtube' => [
            'HTML.SafeIframe'      => 'true',
            'URI.SafeIframeRegexp' => '%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%',
        ],
        'custom_definition' => [
            'id'  => 'html5-definitions',
            'rev' => 1,
            'debug' => false,
            'elements' => [
                // http://developers.whatwg.org/sections.html
                ['section', 'Block', 'Flow', 'Common'],
                ['nav',     'Block', 'Flow', 'Common'],
                ['article', 'Block', 'Flow', 'Common'],
                ['aside',   'Block', 'Flow', 'Common'],
                ['header',  'Block', 'Flow', 'Common'],
                ['footer',  'Block', 'Flow', 'Common'],
				
                // Content model actually can be omitted here, as it's handled by the PHP-HTMLPurifier library
                ['address', 'Block', 'Flow', 'Common'],
                ['hgroup', 'Block', 'Flow', 'Common'],
				
                // http://developers.whatwg.org/grouping-content.html
                ['figure', 'Block', 'Flow', 'Common'],
                ['figcaption', 'Inline', 'Flow', 'Common'],
				
                // http://developers.whatwg.org/the-video-element.html#the-video-element
                ['video', 'Block', 'Flow', 'Common', [
                    'src'      => 'URI',
                    'type'     => 'Text',
                    'width'    => 'Length',
                    'height'   => 'Length',
                    'poster'   => 'URI',
                    'preload'  => 'Enum#auto,metadata,none',
                    'controls' => 'Bool',
                ]],
                ['source', 'Block', 'Flow', 'Common', [
                    'src' => 'URI',
                    'type' => 'Text',
                ]],

                // http://developers.whatwg.org/text-level-semantics.html
                ['s',    'Inline', 'Inline', 'Common'],
                ['var',  'Inline', 'Inline', 'Common'],
                ['sub',  'Inline', 'Inline', 'Common'],
                ['sup',  'Inline', 'Inline', 'Common'],
                ['mark', 'Inline', 'Inline', 'Common'],
                ['wbr',  'Inline', 'Inline', 'Common'],
				
                // http://developers.whatwg.org/edits.html
                ['ins', 'Block', 'Flow', 'Common', ['cite' => 'URI', 'datetime' => 'Text']],
                ['del', 'Block', 'Flow', 'Common', ['cite' => 'URI', 'datetime' => 'Text']],
            ],
            'attributes' => [
                ['iframe', 'allowfullscreen', 'Bool'],
                ['img', 'loading', 'Enum#lazy,eager'],
                ['table', 'height', 'Text'],
                ['td', 'border', 'Text'],
                ['th', 'border', 'Text'],
                ['tr', 'width', 'Text'],
                ['tr', 'height', 'Text'],
                ['tr', 'border', 'Text'],
            ],
        ],
        'custom_attributes' => [
            ['a', 'target', 'Enum#_blank,_self,_target,_top'],
        ],
        'custom_elements' => [
            ['u', 'Inline', 'Inline', 'Default'],
        ],
    ],
];
