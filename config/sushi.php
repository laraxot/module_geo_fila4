<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
declare(strict_types=1);

<<<<<<< HEAD
=======

>>>>>>> be08416 (.)
return [
    /*
     * |--------------------------------------------------------------------------
     * | Sushi Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Qui puoi configurare le impostazioni per il pacchetto Sushi.
     * |
     */

    /*
     * |--------------------------------------------------------------------------
     * | Cache Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione della cache per i modelli Sushi.
     * |
     */
<<<<<<< HEAD
=======
return [
    /*
    |--------------------------------------------------------------------------
    | Sushi Configuration
    |--------------------------------------------------------------------------
    |
    | Qui puoi configurare le impostazioni per il pacchetto Sushi.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione della cache per i modelli Sushi.
    |
    */
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
    'cache' => [
        'enabled' => env('SUSHI_CACHE_ENABLED', true),
        'duration' => env('SUSHI_CACHE_DURATION', 60 * 24 * 7), // 7 giorni
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Database Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione del database SQLite per i modelli Sushi.
     * |
     */
<<<<<<< HEAD
=======

    /*
    |--------------------------------------------------------------------------
    | Database Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione del database SQLite per i modelli Sushi.
    |
    */
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
    'database' => [
        'connection' => env('SUSHI_DB_CONNECTION', 'sqlite'),
        'database' => env('SUSHI_DB_DATABASE', ':memory:'),
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Models Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione specifica per i modelli Sushi.
     * |
     */
<<<<<<< HEAD
=======

    /*
    |--------------------------------------------------------------------------
    | Models Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione specifica per i modelli Sushi.
    |
    */
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
    'models' => [
        'comune' => [
            'file' => 'database/content/comuni.json',
            'schema' => [
                'id' => 'integer',
                'regione' => 'string',
                'provincia' => 'string',
                'comune' => 'string',
                'cap' => 'string',
                'lat' => 'float',
                'lng' => 'float',
                'created_at' => 'datetime',
                'updated_at' => 'datetime',
            ],
            'casts' => [
                'lat' => 'float',
                'lng' => 'float',
                'created_at' => 'datetime',
                'updated_at' => 'datetime',
            ],
            'fillable' => [
                'regione',
                'provincia',
                'comune',
                'cap',
                'lat',
                'lng',
            ],
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
];
=======
]; 
>>>>>>> bc26394 (.)
=======
];
>>>>>>> c942565 (.)
