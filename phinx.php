<?php

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'development' => [
                'adapter' => 'mysql',
                'host' => getenv("DB_HOST"),
                'name' => getenv("DB_NAME"),
                'user' => getenv("DB_USER"),
                'pass' => getenv("DB_PASSWORD_FILE") ? rtrim(file_get_contents(getenv("DB_PASSWORD_FILE"))) : "",
                'port' => getenv("DB_PORT"),
                'charset' => 'utf8',
            ]
        ],
        'version_order' => 'creation'
    ];
