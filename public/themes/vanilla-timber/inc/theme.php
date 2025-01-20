<?php

namespace Flynt\Theme;

use Flynt\Utils\Options;

add_action('after_setup_theme', function (): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    /*
     * Remove type attribute from link and script tags.
     */
    add_theme_support('html5', ['script', 'style']);
});

add_filter('big_image_size_threshold', '__return_false');

add_filter('timber/context', function (array $context): array {
    $context['theme']->labels = Options::getTranslatable('Theme')['labels'] ?? [];
    return $context;
});

Options::addTranslatable('Theme', [
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Feed', 'flynt'),
                'instructions' => __('%s is placeholder for site title.', 'flynt'),
                'name' => 'feed',
                'type' => 'text',
                'default_value' => __('%s Feed', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Skip to main content', 'flynt'),
                'name' => 'skipToMainContent',
                'type' => 'text',
                'default_value' => __('Skip to main content', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Main Content – Aria Label', 'flynt'),
                'name' => 'mainContentAriaLabel',
                'type' => 'text',
                'default_value' => __('Content', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
]);

Options::addGlobal('ThemeSettings', [
    [
        'label' => __('Default Entry Header Image', 'flynt'),
        'instructions' => __('If no featured image is set for a page/post, this image will be used as a fallback for the page header.', 'flynt'),
        'name' => 'entry_header_default_image',
        'type' => 'image',
        'return_format' => 'id',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'required' => 0,
    ],
    [
        'label' => __('Company Short Description', 'flynt'),
        'name' => 'business_short_description',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => __('Enter a short description of the company', 'flynt'),
        'maxlength' => 255,
    ],
    [
        'label' => __('Contact Page', 'flynt'),
        'name' => 'contact_page',
        'type' => 'link',
        'default_value' => '',
        'placeholder' => __('Set the default Contact Page', 'flynt'),
    ],
    [
        'label' => __('Sponsors', 'flynt'),
        'name' => 'sponsors_accordion',
        'type' => 'accordion',
        'open' => 0,
        'multi_expand' => 0,
        'endpoint' => 0,
    ],
    [
        'label' => __('Sponsors', 'flynt'),
        'name' => 'sponsors',
        'type' => 'repeater',
        'default_value' => '',
        'placeholder' => __('Enter sponsor section title', 'flynt'),
        'sub_fields' => [
            [
                'label' => 'Sponsor Logo',
                'name' => 'image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => 0,
                'max_width' => 0,
                'min_height' => 0,
                'max_height' => 0,
                'min_size' => 0,
                'max_size' => 0,
                'mime_types' => 'jpg,jpeg,png,svg'
            ],   
        ]
    ],
    [
        'label' => __('Contact Information', 'flynt'),
        'name' => 'contact_info_accordion',
        'type' => 'accordion',
        'open' => 0,
        'multi_expand' => 0,
        'endpoint' => 0,
    ],
    [
        'label' => __('Default Form ID', 'flynt'),
        'name' => 'defaultFormId',
        'type' => 'number',
    ],
    [
        'label' => __('Default Content', 'flynt'),
        'name' => 'defaultFormContentHtml',
        'type' => 'wysiwyg',
    ],
    [
        'label' => __('Opening Hours', 'flynt'),
        'name' => 'business_opening_hours',
        'type' => 'wysiwyg',
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'media_upload' => 0,
    ],
    [
        'label' => __('Email', 'flynt'),
        'name' => 'business_email',
        'type' => 'email',
        'default_value' => '',
        'placeholder' => __('Enter business email', 'flynt'),
    ],
    [
        'label' => __('Phone', 'flynt'),
        'name' => 'business_phone',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => __('Enter business phone number', 'flynt'),
    ],
    [
        'label' => __('Fax', 'flynt'),
        'name' => 'business_fax',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => __('Enter business fax number', 'flynt'),
    ],
    [
        'label' => __('Street Address', 'flynt'),
        'name' => 'business_street_address',
        'type' => 'textarea',
        'rows' => 2,
        'new_lines' => 'br',
        'default_value' => '',
        'placeholder' => __('Enter business street address', 'flynt'),
    ],
    [
        'label' => __('Postal Address', 'flynt'),
        'name' => 'business_postal_address',
        'type' => 'textarea',
        'rows' => 2,
        'new_lines' => 'br',
        'default_value' => '',
        'placeholder' => __('Enter business postal address', 'flynt'),
    ],
    [
        'label' => __('Social Media', 'flynt'),
        'name' => 'social_media_accordion',
        'type' => 'accordion',
        'open' => 0,
        'multi_expand' => 0,
        'endpoint' => 0,
    ],
    [
        'label' => __('Facebook', 'flynt'),
        'name' => 'facebook',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Facebook URL', 'flynt'),
    ],
    [
        'label' => __('Instagram', 'flynt'),
        'name' => 'instagram',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Instagram URL', 'flynt'),
    ],
    [
        'label' => __('Twitter', 'flynt'),
        'name' => 'twitter',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Twitter URL', 'flynt'),
    ],
    [
        'label' => __('YouTube', 'flynt'),
        'name' => 'youtube',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter YouTube URL', 'flynt'),
    ],
    [
        'label' => __('Vimeo', 'flynt'),
        'name' => 'vimeo',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Vimeo URL', 'flynt'),
    ],
    [
        'label' => __('LinkedIn', 'flynt'),
        'name' => 'linkedin',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter LinkedIn URL', 'flynt'),
    ],
    [
        'label' => __('Pinterest', 'flynt'),
        'name' => 'pinterest',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Pinterest URL', 'flynt'),
    ],
    [
        'label' => __('Tumblr', 'flynt'),
        'name' => 'tumblr',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Tumblr URL', 'flynt'),
    ],
    [
        'label' => __('Dribbble', 'flynt'),
        'name' => 'dribbble',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Dribbble URL', 'flynt'),
    ],
    [
        'label' => __('Behance', 'flynt'),
        'name' => 'behance',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Behance URL', 'flynt'),
    ],
    [
        'label' => __('WhatsApp', 'flynt'),
        'name' => 'whatsapp',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter WhatsApp URL', 'flynt'),
    ],
    [
        'label' => __('Telegram', 'flynt'),
        'name' => 'telegram',
        'type' => 'url',
        'default_value' => '',
        'placeholder' => __('Enter Telegram URL', 'flynt'),
    ],
    [
        'label' => __('Google My Business', 'flynt'),
        'name' => 'google_my_business',
        'type' => 'url',
        'instructions' => __('If a Google My Business URL is provided here, it will be used to create a link everywhere the street address is shown.', 'flynt'),
        'default_value' => '',
        'placeholder' => __('Enter Google My Business URL', 'flynt'),
    ],
    [
        'label' => __('SEO Settings', 'flynt'),
        'name' => 'seo_settings_accordion',
        'type' => 'accordion',
        'open' => 0,
        'multi_expand' => 0,
        'endpoint' => 0,
    ],
    [
        'label' => __('Schema Logo', 'flynt'),
        'name' => 'site_schema_logo',
        'type' => 'image',
        'instructions' => __('This image will be linked to as the business logo in various schema. This image is not used anywhere on the front-end.', 'flynt'),
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
    ],
]);