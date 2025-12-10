<?php

declare(strict_types=1);

return [
    /*
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
     * |--------------------------------------------------------------------------
     * | API Keys
     * |--------------------------------------------------------------------------
     * |
     * | Chiavi API per i vari servizi di mappe utilizzati dal modulo.
     * |
     */
<<<<<<< HEAD
=======
    |--------------------------------------------------------------------------
    | API Keys
    |--------------------------------------------------------------------------
    |
    | Chiavi API per i vari servizi di mappe utilizzati dal modulo.
    |
    */
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
    'api_keys' => [
        'google_maps' => env('GOOGLE_MAPS_API_KEY'),
        'bing_maps' => env('BING_MAPS_API_KEY'),
        'mapbox' => env('MAPBOX_API_KEY'),
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
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

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting
    |--------------------------------------------------------------------------
    |
    | Configurazione per il rate limiting delle chiamate API.
    |
    */
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
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
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
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

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Configurazione per la cache dei risultati.
    |
    */
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
    'cache' => [
        'enabled' => true,
        'ttl' => 86400, // 24 ore
        'prefix' => 'geo_',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
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

    /*
    |--------------------------------------------------------------------------
    | Timeout & Retry
    |--------------------------------------------------------------------------
    |
    | Configurazione per timeout e retry delle chiamate API.
    |
    */
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
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
