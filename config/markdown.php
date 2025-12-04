<?php

use App\Markdown\CustomHeadingRenderer;
use App\Markdown\CustomLinkRenderer;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\CommonMark\Node\Block\ListBlock;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\DefaultAttributes\DefaultAttributesExtension;
use League\CommonMark\Extension\Footnote\FootnoteExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\Table;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsGenerator;

return [
    'code_highlighting' => [
        /*
         * To highlight code, we'll use Shiki under the hood. Make sure it's installed.
         *
         * More info: https://spatie.be/docs/laravel-markdown/v1/installation-setup
         */
        'enabled' => true,

        /*
         * The name of or path to a Shiki theme
         *
         * More info: https://github.com/shikijs/shiki/blob/main/docs/themes.md
         */
        'theme' => 'github-light',
    ],

    /*
     * When enabled, anchor links will be added to all titles
     */
    'add_anchors_to_headings' => false,

    /**
     * When enabled, anchors will be rendered as links.
     */
    'render_anchors_as_links' => false,

    /*
     * These options will be passed to the league/commonmark package which is
     * used under the hood to render markdown.
     *
     * More info: https://spatie.be/docs/laravel-markdown/v1/using-the-blade-component/passing-options-to-commonmark
     */
    'commonmark_options' => [
        'html_input' => 'escape',
        /*
     * Unsafe links are also allowed by default due to CommonMark spec compliance.
     * An unsafe link is one that uses any of these protocols:
     * javascript:
     * vbscript:
     * file:
     * data: (except for data:image in png, gif, jpeg, or webp format)
     */
        'allow_unsafe_links' => false,

        'heading_permalink' => [
            'html_class' => '',
            'id_prefix' => '',
            'apply_id_to_heading' => false,
            'heading_class' => 'sectionHeader',
            'fragment_prefix' => '',
            'insert' => 'before',
            'min_heading_level' => 1,
            'max_heading_level' => 6,
            'title' => '',
            'symbol' => '',
            'aria_hidden' => true,
        ],

        'table_of_contents' => [
            'html_class' => 'table-of-contents',
            'position' => 'placeholder',
            'style' => 'bullet',
            'min_heading_level' => 1,
            'max_heading_level' => 6,
            'normalize' => 'relative',
            'placeholder' => "[TOC]",
        ],

        'default_attributes' => [
            ListItem::class => [
                'class' => "list-disc ml-4",
            ],
        ],
        'footnote' => [
            'backref_class'      => 'footnote-backref text-blue-500',
            'backref_symbol'     => '^',
            'container_add_hr'   => false,
            'container_class'    => 'footnotes',
            'ref_class'          => 'footnote-ref text-blue-500',
            'ref_id_prefix'      => 'fnref:',
            'footnote_class'     => 'footnote',
            'footnote_id_prefix' => 'fn:',
        ],
        'table' => [
            'wrap' => [
                'enabled' => false,
                'tag' => 'div',
                'attributes' => [],
            ],
            'alignment_attributes' => [
                'left'   => ['align' => 'left'],
                'center' => ['align' => 'center'],
                'right'  => ['align' => 'right'],
            ],
        ],
    ],

    /*
     * Rendering markdown to HTML can be resource intensive. By default
     * we'll cache the results.
     *
     * You can specify the name of a cache store here. When set to `null`
     * the default cache store will be used. If you do not want to use
     * caching set this value to `false`.
     */
    'cache_store' => false,


    /*
     * When cache_store is enabled, this value will be used to determine
     * how long the cache will be valid. If you set this to `null` the
     * cache will never expire.
     *
     */
    'cache_duration' => null,

    /*
     * This class will convert markdown to HTML
     *
     * You can change this to a class of your own to greatly
     * customize the rendering process
     *
     * More info: https://spatie.be/docs/laravel-markdown/v1/advanced-usage/customizing-the-rendering-process
     */
    'renderer_class' => Spatie\LaravelMarkdown\MarkdownRenderer::class,

    /*
     * These extensions should be added to the markdown environment. A valid
     * extension implements League\CommonMark\Extension\ExtensionInterface
     *
     * More info: https://commonmark.thephpleague.com/2.4/extensions/overview/
     */
    'extensions' => [
        TableOfContentsExtension::class,
        HeadingPermalinkExtension::class,
        DefaultAttributesExtension::class,
        FootnoteExtension::class,
        TableExtension::class,
    ],

    /*
     * These block renderers should be added to the markdown environment. A valid
     * renderer implements League\CommonMark\Renderer\NodeRendererInterface;
     *
     * More info: https://commonmark.thephpleague.com/2.4/customization/rendering/
     */
    'block_renderers' => [
        // ['class' => Heading::class, 'renderer' => CustomHeadingRenderer::class, 'priority' => 0],
    ],

    /*
     * These inline renderers should be added to the markdown environment. A valid
     * renderer implements League\CommonMark\Renderer\NodeRendererInterface;
     *
     * More info: https://commonmark.thephpleague.com/2.4/customization/rendering/
     */
    'inline_renderers' => [
        // ['class' => FencedCode::class, 'renderer' => MyCustomCodeRenderer::class, 'priority' => 0]
        ['class' => Link::class, 'renderer' => CustomLinkRenderer::class, 'priority' => 0]
    ],

    /*
     * These inline parsers should be added to the markdown environment. A valid
     * parser implements League\CommonMark\Renderer\InlineParserInterface;
     *
     * More info: https://commonmark.thephpleague.com/2.4/customization/inline-parsing/
     */
    'inline_parsers' => [
        // ['parser' => MyCustomInlineParser::class, 'priority' => 0]
    ],
];
