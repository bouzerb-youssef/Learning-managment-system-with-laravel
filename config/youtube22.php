<?php

return [

    /**
     * Application Name.
     */
    'application_name' => 'Your Application',

    /**
     * Client ID.
     */
    'client_id' =>'249938348464-398os9nndg1drak2a67pqujouuq7oemo.apps.googleusercontent.com',

    /**
     * Client Secret.
     */
    'client_secret' =>'PupbxPKv_M0nV50PK6YSSjrh',

    /**
     * Access Type
     */
    'access_type' => 'offline',

    /**
     * Approval Prompt
     */
    'approval_prompt' => 'auto',

    /**
     * Scopes.
     */
    'scopes' => [
        'https://www.googleapis.com/auth/youtube',
        'https://www.googleapis.com/auth/youtube.upload',
        'https://www.googleapis.com/auth/youtube.readonly'
    ],

    /**
     * Developer key.
     */
    'developer_key' => env('GOOGLE_DEVELOPER_KEY', null),

    /**
     * Route URI's
     */
    'routes' => [
        'enabled' => true,
        /**
         * 
         * The prefix for the below URI's
         */
        'prefix' => 'youtube',

        /**
         * Redirect URI
         */
        'redirect_uri' => 'callback',

        /**
         * The autentication URI
         */
        'authentication_uri' => 'auth',

    ]

];