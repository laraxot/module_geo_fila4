<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
declare(strict_types=1);

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
=======
=======
declare(strict_types=1);


>>>>>>> b93ef594b4 (.)
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
>>>>>>> origin/develop
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione della cache per i modelli Sushi.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
     * |--------------------------------------------------------------------------
     * | Cache Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione della cache per i modelli Sushi.
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    'cache' => [
        'enabled' => env('SUSHI_CACHE_ENABLED', true),
        'duration' => env('SUSHI_CACHE_DURATION', 60 * 24 * 7), // 7 giorni
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
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
=======
=======
>>>>>>> origin/develop

    /*
    |--------------------------------------------------------------------------
    | Database Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione del database SQLite per i modelli Sushi.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /*
     * |--------------------------------------------------------------------------
     * | Database Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione del database SQLite per i modelli Sushi.
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    'database' => [
        'connection' => env('SUSHI_DB_CONNECTION', 'sqlite'),
        'database' => env('SUSHI_DB_DATABASE', ':memory:'),
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
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
=======
=======
>>>>>>> origin/develop

    /*
    |--------------------------------------------------------------------------
    | Models Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione specifica per i modelli Sushi.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /*
     * |--------------------------------------------------------------------------
     * | Models Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione specifica per i modelli Sushi.
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
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
];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
];
=======
]; 
>>>>>>> a12f125f4a (.)
=======
];
>>>>>>> b93ef594b4 (.)
=======
]; 
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
