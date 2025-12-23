<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Geo\App\Http\Controllers\Api\MapController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Qui vengono definite le rotte API per il modulo Geo.
| Queste rotte sono caricate dal RouteServiceProvider del modulo.
|
*/

Route::prefix('api/geo')->group(function (): void {
    // Rotte per la mappa interattiva
    Route::prefix('map')->group(function (): void {
        // Marker
        Route::get('/markers', [MapController::class, 'markers']);
        Route::get('/tickets', [MapController::class, 'tickets']);
        Route::get('/users', [MapController::class, 'users']);
        Route::get('/locations', [MapController::class, 'locations']);

        // Statistiche
        Route::get('/stats', [MapController::class, 'stats']);

        // Esportazione
        Route::post('/export', [MapController::class, 'export']);

        // Geocoding
        Route::post('/geocode', [MapController::class, 'geocode']);
        Route::get('/suggestions', [MapController::class, 'suggestions']);
        Route::get('/location', [MapController::class, 'location']);
    });
});





