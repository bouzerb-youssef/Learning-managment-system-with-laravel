<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'books' => [
            'driver' => 'local',
            'root' => storage_path('app/public/books'),
            'url' => env('APP_URL').'/storage/books',
            'visibility' => 'public',
        ],
        'cources' => [
            'driver' => 'local',
            'root' => storage_path('app/public/cources'),
            'url' => env('APP_URL').'/storage/cources',
            'visibility' => 'public',
        ],
        'student' => [
            'driver' => 'local',
            'root' => storage_path('app/public/student'),
            'url' => env('APP_URL').'/storage/student',
            'visibility' => 'public',
        ],
        'teacher' => [
            'driver' => 'local',
            'root' => storage_path('app/public/teacher'),
            'url' => env('APP_URL').'/storage/teacher',
            'visibility' => 'public',
        ],
        'studentAttachement' => [
            'driver' => 'local',
            'root' => storage_path('app/public/studentAttachement'),
            'url' => env('APP_URL').'/storage/studentAttachement',
            'visibility' => 'public',
        ],
        'content' => [
            'driver' => 'local',
            'root' => storage_path('app/public/content'),
            'url' => env('APP_URL').'/storage/content',
            'visibility' => 'public',
        ],
        'questions' => [
            'driver' => 'local',
            'root' => storage_path('app/public/questions'),
            'url' => env('APP_URL').'/storage/questions',
            'visibility' => 'public',
        ],
        'options' => [
            'driver' => 'local',
            'root' => storage_path('app/public/options'),
            'url' => env('APP_URL').'/storage/options',
            'visibility' => 'public',
        ],
       
        'profile-photos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/profile-photos'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'materials' => [
            'driver' => 'local',
            'root' => storage_path('app/public/materials'),
            'url' => env('APP_URL').'/storage/materials',
            'visibility' => 'public',
        ],
        'lessons' => [
            'driver' => 'local',
            'root' => storage_path('app/public/lessons'),
            'url' => env('APP_URL').'/storage/lessons',
            'visibility' => 'public',
        ],
        'lessons-temp' => [
            'driver' => 'local',
            'root' => storage_path('app/public/lessons-temp'),
            'url' => env('APP_URL').'/storage/lessons-temp',
            'visibility' => 'public',
        ],
       
       
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
