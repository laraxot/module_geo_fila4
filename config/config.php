<?php

declare(strict_types=1);

return [
    /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> f0b4f5c (.)
     * |--------------------------------------------------------------------------
     * | API Keys
     * |--------------------------------------------------------------------------
     * |
     * | Chiavi API per i vari servizi di mappe utilizzati dal modulo.
     * |
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
    |--------------------------------------------------------------------------
    | API Keys
    |--------------------------------------------------------------------------
    |
    | Chiavi API per i vari servizi di mappe utilizzati dal modulo.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    'api_keys' => [
        'google_maps' => env('GOOGLE_MAPS_API_KEY'),
        'bing_maps' => env('BING_MAPS_API_KEY'),
        'mapbox' => env('MAPBOX_API_KEY'),
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
    /*
     * |--------------------------------------------------------------------------
     * | Rate Limiting
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione per il rate limiting delle chiamate API.
     * |
     */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting
    |--------------------------------------------------------------------------
    |
    | Configurazione per il rate limiting delle chiamate API.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /*
     * |--------------------------------------------------------------------------
     * | Rate Limiting
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione per il rate limiting delle chiamate API.
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    'rate_limits' => [
        'google_maps' => [
            'requests_per_second' => 50,
            'burst' => 100,
        ],
        'bing_maps' => [
            'requests_per_second' => 50,
            'burst' => 100,
        ],
        'mapbox' => [
            'requests_per_second' => 50,
            'burst' => 100,
        ],
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
    /*
     * |--------------------------------------------------------------------------
     * | Cache
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione per la cache dei risultati.
     * |
     */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Configurazione per la cache dei risultati.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /*
     * |--------------------------------------------------------------------------
     * | Cache
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione per la cache dei risultati.
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    'cache' => [
        'enabled' => true,
        'ttl' => 86400, // 24 ore
        'prefix' => 'geo_',
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
    /*
     * |--------------------------------------------------------------------------
     * | Timeout & Retry
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione per timeout e retry delle chiamate API.
     * |
     */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop

    /*
    |--------------------------------------------------------------------------
    | Timeout & Retry
    |--------------------------------------------------------------------------
    |
    | Configurazione per timeout e retry delle chiamate API.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /*
     * |--------------------------------------------------------------------------
     * | Timeout & Retry
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione per timeout e retry delle chiamate API.
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    'http_client' => [
        'timeout' => 5.0,
        'retry' => [
            'times' => 3,
            'sleep' => 100,
            'when' => [
                'ConnectionException',
                'RequestException',
            ],
        ],
    ],
];
