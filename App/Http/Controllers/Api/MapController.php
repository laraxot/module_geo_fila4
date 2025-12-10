<?php

declare(strict_types=1);

namespace Modules\Geo\App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Geo\App\Services\GeocodingService;
use Modules\Geo\App\Services\MapService;

/**
 * Controller API per la gestione delle mappe interattive.
 *
 * Fornisce endpoint per visualizzare marker geografici,
 * filtri dinamici e integrazione con servizi di geocoding.
 */
final class MapController extends Controller
{
    public function __construct(
        private readonly MapService $mapService,
        private readonly GeocodingService $geocodingService
    ) {
        $this->middleware('auth:sanctum');
    }

    /**
     * Ottiene tutti i marker per la mappa.
     */
    public function markers(Request $request): JsonResponse
    {
        /** @var array<string, mixed> $filters */
        $filters = $request->validate([
            'tickets' => 'boolean',
            'users' => 'boolean',
            'locations' => 'boolean',
            'status' => 'array',
            'status.*' => 'string|in:pending,assigned,in_progress,resolved,closed',
            'priority' => 'array',
            'priority.*' => 'string|in:low,medium,high,critical',
            'type' => 'array',
            'type.*' => 'string',
            'roles' => 'array',
            'roles.*' => 'string',
            'location_types' => 'array',
            'location_types.*' => 'string|in:office,warehouse,shop,restaurant,hospital,school,park,station',
            'bounds' => 'array',
            'bounds.south' => 'numeric',
            'bounds.north' => 'numeric',
            'bounds.west' => 'numeric',
            'bounds.east' => 'numeric',
        ]);

        $markers = $this->mapService->getMarkers($filters);

        return response()->json([
            'success' => true,
            'data' => $markers,
            'meta' => [
                'total' => count($markers),
                'filters_applied' => $filters,
                'generated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Ottiene marker per i ticket.
     */
    public function tickets(Request $request): JsonResponse
    {
        /** @var array<string, mixed> $filters */
        $filters = $request->validate([
            'status' => 'array',
            'status.*' => 'string|in:pending,assigned,in_progress,resolved,closed',
            'priority' => 'array',
            'priority.*' => 'string|in:low,medium,high,critical',
            'type' => 'array',
            'type.*' => 'string',
            'bounds' => 'array',
            'bounds.south' => 'numeric',
            'bounds.north' => 'numeric',
            'bounds.west' => 'numeric',
            'bounds.east' => 'numeric',
        ]);

        $filters['tickets'] = true;
        $markers = $this->mapService->getMarkers($filters);

        return response()->json([
            'success' => true,
            'data' => $markers,
            'meta' => [
                'total' => count($markers),
                'filters_applied' => $filters,
                'generated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Ottiene marker per gli utenti.
     */
    public function users(Request $request): JsonResponse
    {
        /** @var array<string, mixed> $filters */
        $filters = $request->validate([
            'roles' => 'array',
            'roles.*' => 'string',
            'bounds' => 'array',
            'bounds.south' => 'numeric',
            'bounds.north' => 'numeric',
            'bounds.west' => 'numeric',
            'bounds.east' => 'numeric',
        ]);

        $filters['users'] = true;
        $markers = $this->mapService->getMarkers($filters);

        return response()->json([
            'success' => true,
            'data' => $markers,
            'meta' => [
                'total' => count($markers),
                'filters_applied' => $filters,
                'generated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Ottiene marker per le posizioni.
     */
    public function locations(Request $request): JsonResponse
    {
        /** @var array<string, mixed> $filters */
        $filters = $request->validate([
            'location_types' => 'array',
            'location_types.*' => 'string|in:office,warehouse,shop,restaurant,hospital,school,park,station',
            'bounds' => 'array',
            'bounds.south' => 'numeric',
            'bounds.north' => 'numeric',
            'bounds.west' => 'numeric',
            'bounds.east' => 'numeric',
        ]);

        $filters['locations'] = true;
        $markers = $this->mapService->getMarkers($filters);

        return response()->json([
            'success' => true,
            'data' => $markers,
            'meta' => [
                'total' => count($markers),
                'filters_applied' => $filters,
                'generated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Ottiene statistiche per la mappa.
     */
    public function stats(Request $request): JsonResponse
    {
        /** @var array<string, mixed> $filters */
        $filters = $request->validate([
            'tickets' => 'boolean',
            'users' => 'boolean',
            'locations' => 'boolean',
            'status' => 'array',
            'status.*' => 'string|in:pending,assigned,in_progress,resolved,closed',
            'priority' => 'array',
            'priority.*' => 'string|in:low,medium,high,critical',
            'type' => 'array',
            'type.*' => 'string',
            'roles' => 'array',
            'roles.*' => 'string',
            'location_types' => 'array',
            'location_types.*' => 'string|in:office,warehouse,shop,restaurant,hospital,school,park,station',
            'bounds' => 'array',
            'bounds.south' => 'numeric',
            'bounds.north' => 'numeric',
            'bounds.west' => 'numeric',
            'bounds.east' => 'numeric',
        ]);

        $stats = $this->mapService->getMapStats($filters);

        return response()->json([
            'success' => true,
            'data' => $stats,
            'meta' => [
                'generated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Esporta i dati della mappa.
     */
    public function export(Request $request): JsonResponse
    {
        $request->validate([
            'format' => 'string|in:json,csv,geojson,kml',
            'filters' => 'array',
        ]);

        $format = (string) $request->input('format', 'json');
        $filters = (array) $request->input('filters', []);

        $data = $this->mapService->exportData($filters, $format);

        $filename = 'map_export_'.now()->format('Y_m_d_H_i_s').'.'.$format;

        return response()->json([
            'success' => true,
            'data' => [
                'content' => $data,
                'filename' => $filename,
                'format' => $format,
                'size' => strlen($data),
            ],
            'meta' => [
                'exported_at' => now()->toISOString(),
                'filters_applied' => $filters,
            ],
        ]);
    }

    /**
     * Geocodifica un indirizzo.
     */
    public function geocode(Request $request): JsonResponse
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        try {
            $address = (string) $request->input('address');
            $result = $this->geocodingService->geocodeAddress($address);

            return response()->json([
                'success' => true,
                'data' => $result,
                'meta' => [
                    'geocoded_at' => now()->toISOString(),
                ],
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Errore durante la geocodifica: '.$e->getMessage(),
                'data' => null,
            ], 400);
        }
    }

    /**
     * Ottiene suggerimenti per un indirizzo.
     */
    public function suggestions(Request $request): JsonResponse
    {
        $request->validate([
            'query' => 'required|string|min:3|max:255',
        ]);

        try {
            $query = (string) $request->input('query');
            $suggestions = $this->geocodingService->getSuggestions($query);

            return response()->json([
                'success' => true,
                'data' => $suggestions,
                'meta' => [
                    'query' => $query,
                    'suggestions_count' => count($suggestions),
                    'generated_at' => now()->toISOString(),
                ],
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Errore durante la ricerca: '.$e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    /**
     * Ottiene informazioni su una posizione specifica.
     */
    public function location(Request $request): JsonResponse
    {
        $request->validate([
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
        ]);

        $latitude = (float) $request->input('lat');
        $longitude = (float) $request->input('lng');

        try {
            $result = $this->geocodingService->reverseGeocode($latitude, $longitude);

            return response()->json([
                'success' => true,
                'data' => $result,
                'meta' => [
                    'coordinates' => [
                        'latitude' => $latitude,
                        'longitude' => $longitude,
                    ],
                    'reverse_geocoded_at' => now()->toISOString(),
                ],
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Errore durante la geocodifica inversa: '.$e->getMessage(),
                'data' => null,
            ], 400);
        }
    }
}
