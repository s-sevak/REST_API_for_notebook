<?php

return [
    'routes' => [
        'api' => 'api/documentation',
        'docs' => 'docs',
        'oauth2_callback' => 'api/oauth2-callback',
    ],
    'paths' => [
        'docs' => base_path('resources/views/vendor/l5-swagger'),
        'annotations' => base_path('app'),
        'swagger_ui_assets' => base_path('vendor/swagger-api/swagger-ui/dist'),
    ],
    'swagger_version' => '3.0',
    'generate_always' => false,
    'generate_yaml_copy' => false,
    'proxy' => false,
    'validate' => true,
    'specs' => [
        [
            'version' => '1.0.0',
            'title' => 'Notebook API',
            'description' => 'API documentation for the Notebook app',
            'basePath' => '/api/v1',
            'schemes' => [
                'http',
                'https',
            ],
            'consumes' => [
                'application/json',
            ],
            'produces' => [
                'application/json',
            ],
            'securityDefinitions' => [
                'bearer' => [
                    'type' => 'apiKey',
                    'name' => 'Authorization',
                    'in' => 'header',
                ],
            ],
        ],
    ],
    'security' => [
        [
            'bearer' => [],
        ],
    ],
];
