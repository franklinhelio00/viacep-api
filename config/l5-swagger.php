<?php
return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'L5 Swagger UI',
            ],
            'routes' => [
                'api' => 'api/documentation',
                'docs' => 'docs',
            ],
            'paths' => [
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),
                'docs' => storage_path('api-docs'),
                'docs_json' => 'api-docs.json',
                'docs_yaml' => 'api-docs.yaml',
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'),
                'annotations' => [
                    base_path('app'),
                    base_path('app/Http/Controllers'),
                    base_path('routes'),
                    base_path('config'),
                ],
                'excludes' => [],
                'base' => null,
            ],
        ],
    ],
    'defaults' => [
    'constants' => [
        'L5_SWAGGER_CONST_HOST' => env('APP_URL', 'http://localhost:8000')
],  
    ],
];
