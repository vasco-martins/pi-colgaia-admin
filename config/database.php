<?php

return [

    'credentials' => [
        'hostname' => env('DB_HOST', 'localhost'),
        'username' => env('DB_USER', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'database' => env('DB_NAME', 'project'),
    ]

];