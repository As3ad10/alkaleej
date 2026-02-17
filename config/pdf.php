<?php

return [
    'mode'                     => 'utf-8',
    'format'                   => 'A4',
    'default_font_size'        => '14',
    'default_font'             => 'KFGQPC Uthman Taha Naskh',
    'margin_left'              => 10,
    'margin_right'             => 10,
    'margin_top'               => 10,
    'margin_bottom'            => 10,
    'margin_header'            => 0,
    'margin_footer'            => 0,
    'orientation'              => 'P',
    'title'                    => 'Laravel mPDF',
    'subject'                  => '',
    'author'                   => '',
    'watermark'                => '',
    'show_watermark'           => false,
    'show_watermark_image'     => false,
    'watermark_font'           => 'sans-serif',
    'display_mode'             => 'fullpage',
    'watermark_text_alpha'     => 0.1,
    'watermark_image_path'     => public_path('pdf-images/watermark.png'),
    'watermark_image_alpha'    => 1,
    'watermark_image_size'     => 'F',
    'watermark_image_position' => 'P',
    'custom_font_dir'          => '',
    'custom_font_data'         => [
        // 'expo' => [ // must be lowercase and snake_case
        //     'R'  => 'SuisseIntl-Regular.ttf',    // regular font
        //     'B'  => 'SuisseIntl-Medium.ttf',       // optional: bold font
        //     'useOTL' => 0xFF,
        //     'useKashida' => 75,
        // ],
    ],
    'auto_language_detection'  => false,
    'temp_dir'                 => storage_path('app'),
    'pdfa'                     => false,
    'pdfaauto'                 => false,
    'use_active_forms'         => false,
];