<?php

return [
    'load_routes' => false,
    'migration_dir' => database_path()."/migrations/crud",
    'per_page' => [
        'key' => 'per_page',
        'value' => 10,
        'limit' => 100,
    ],
];
