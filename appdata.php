<?php return [
    'autoload' => [
        'config' => [
            'ext' => 'php'
        ],
        'paths' => [
            'App\\' => 'app/',

            'App\\Database\\' => 'app/database/',
            'App\\Database\\Entities\\' => 'app/database/entities/',
            'App\\Database\\Exceptions\\' => 'app/database/exceptions/',
            
            'App\\Global\\' => 'app/global/',
            
            'App\\Http\\' => 'app/http/',
            'App\\Http\\Controllers\\' => 'app/http/controllers/',
            'App\\Http\\Exceptions\\' => 'app/http/exceptions/',
            'App\\Http\\Requests\\' => 'app/http/requests/',
            'App\\Http\\Routes\\' => 'app/http/routes/',
             
            'Bootstrap\\' => 'bootstrap/',
            
            'Config\\' => 'config/',
            
            'Resources\\Helpers\\' => 'resources/helpers/',
            'Resources\\Storage\\Cache\\' => 'resources/storage/cache/',
            'Resources\\Storage\\Session\\' => 'resources/storage/session/',
             
            'System\\' => 'system/',
            'System\\Core\\' => 'system/core/',
            'System\\Core\\Auth\\' => 'system/core/auth/',
            'System\\Core\\Caching\\' => 'system/core/caching/',
            'System\\Core\\Cookies\\' => 'system/core/cookies/',
            'System\\Core\\Database\\' => 'system/core/database/',
            'System\\Core\\Encriptor\\' => 'system/core/encriptor/',
            'System\\Core\\Http\\' => 'system/core/http/',
            'System\\Core\\Logger\\' => 'system/core/logger/',
            'System\\Core\\Router\\' => 'system/core/router/',
            'System\\Core\\Session\\' => 'system/core/session/',
            'System\\Core\\View\\' => 'system/core/view/',
            'System\\Exceptions\\' => 'system/exceptions/',
            'System\\Interfaces\\' => 'system/interfaces/',

             //For Testing autoload
            'Tests\\Autoload\\' => 'tests/autoload/',
            'Tests\\Autoload\\Dir1\\' => 'tests/autoload/dir1/',
            'Tests\\Autoload\\Dir1\\Dir2\\' => 'tests/autoload/dir1/dir2/',
            'Tests\\Autoload\\Dir1\\Dir2\\Dir3\\' => 'tests/autoload/dir1/dir2/dir3/',
            'Tests\\Autoload\\Dir1\\Dir2\\Dir4\\' => 'tests/autoload/dir1/dir2/dir4/'
        ]
    ]

];