<?php

declare(strict_types=1);

namespace Modules\Geo\App\Services;

use Modules\Fixcity\App\Models\Ticket;
use Modules\Geo\App\Models\GeoLocation;
use Modules\User\Models\User;

use function Safe\fclose;
use function Safe\fopen;
use function Safe\fputcsv;
use function Safe\json_encode;
use function Safe\rewind;
use function Safe\stream_get_contents;

/**
 * Servizio per la gestione delle mappe interattive.
 *
 * Fornisce funzionalità per visualizzare marker geografici,
 * filtri dinamici e integrazione con OpenStreetMap.
 */
class MapService
{
    /**
     * Ottiene tutti i marker per la mappa.
     */
    public function getMarkers(array $filters = []): array
    {
        $markers = [];

        if (isset($filters['tickets']) && $filters['tickets']) {
            $markers = array_merge($markers, $this->getTicketMarkers($filters));
        }

        if (isset($filters['users']) && $filters['users']) {
            $markers = array_merge($markers, $this->getUserMarkers($filters));
        }

        if (isset($filters['locations']) && $filters['locations']) {
            $markers = array_merge($markers, $this->getLocationMarkers($filters));
        }

        return $markers;
    }

    /**
     * Ottiene marker per i ticket.
     */
    private function getTicketMarkers(array $filters = []): array
    {
        $query = Ticket::whereNotNull('latitude')
            ->whereNotNull('longitude');

        // Filtri per stato
        if (isset($filters['status']) && is_array($filters['status'])) {
            $query->whereHas('status', function ($q) use ($filters): void {
                $q->whereIn('slug', $filters['status']);
            });
        }

        // Filtri per priorità
        if (isset($filters['priority']) && is_array($filters['priority'])) {
            $query->whereHas('priority', function ($q) use ($filters): void {
                $q->whereIn('slug', $filters['priority']);
            });
        }

        // Filtri per tipo
        if (isset($filters['type']) && is_array($filters['type'])) {
            $query->whereHas('type', function ($q) use ($filters): void {
                $q->whereIn('slug', $filters['type']);
            });
        }

        // Filtri geografici
        if (isset($filters['bounds']) && is_array($filters['bounds'])) {
            $bounds = $filters['bounds'];
            $south = is_numeric($bounds['south'] ?? null) ? (float) $bounds['south'] : -90;
            $north = is_numeric($bounds['north'] ?? null) ? (float) $bounds['north'] : 90;
            $west = is_numeric($bounds['west'] ?? null) ? (float) $bounds['west'] : -180;
            $east = is_numeric($bounds['east'] ?? null) ? (float) $bounds['east'] : 180;
            
            $query->whereBetween('latitude', [$south, $north])
                ->whereBetween('longitude', [$west, $east]);
        }

        $tickets = $query->with(['status', 'priority', 'type', 'user', 'profile'])->get();

        $markers = [];
        foreach ($tickets as $ticket) {
            $markers[] = [
                'id' => $ticket->id,
                'type' => 'ticket',
                'lat' => (float) $ticket->latitude,
                'lng' => (float) $ticket->longitude,
                'title' => $ticket->name,
                'description' => $ticket->description,
                'status' => $ticket->status->slug ?? 'unknown',
                'priority' => $ticket->priority->slug ?? 'unknown',
                'type_slug' => $ticket->type->slug ?? 'unknown',
                'user_name' => $ticket->user->name ?? 'Sconosciuto',
                'created_at' => $ticket->created_at?->format('d/m/Y H:i'),
                'url' => route('fixcity.tickets.show', $ticket),
                'icon' => $this->getTicketIcon($ticket),
                'color' => $this->getTicketColor($ticket),
            ];
        }

        return $markers;
    }

    /**
     * Ottiene marker per gli utenti.
     */
    private function getUserMarkers(array $filters = []): array
    {
        // Per ora restituiamo array vuoto poiché User non ha latitude/longitude
        // TODO: Implementare quando User avrà coordinate geografiche
        return [];
    }

    /**
     * Ottiene marker per le posizioni.
     */
    private function getLocationMarkers(array $filters = []): array
    {
        $query = GeoLocation::whereNotNull('latitude')
            ->whereNotNull('longitude');

        // Filtri per tipo
        if (isset($filters['location_types']) && is_array($filters['location_types'])) {
            $query->whereIn('type', $filters['location_types']);
        }

        // Filtri geografici
        if (isset($filters['bounds']) && is_array($filters['bounds'])) {
            $bounds = $filters['bounds'];
            $south = is_numeric($bounds['south'] ?? null) ? (float) $bounds['south'] : -90;
            $north = is_numeric($bounds['north'] ?? null) ? (float) $bounds['north'] : 90;
            $west = is_numeric($bounds['west'] ?? null) ? (float) $bounds['west'] : -180;
            $east = is_numeric($bounds['east'] ?? null) ? (float) $bounds['east'] : 180;
            
            $query->whereBetween('latitude', [$south, $north])
                ->whereBetween('longitude', [$west, $east]);
        }

        return $query->get()
            ->map(function (GeoLocation $location) {
                return [
                    'id' => $location->id,
                    'type' => 'location',
                    'lat' => (float) $location->latitude,
                    'lng' => (float) $location->longitude,
                    'title' => $location->name,
                    'description' => $location->description,
                    'location_type' => $location->type,
                    'address' => $location->address,
                    'url' => route('locations.show', $location),
                    'icon' => $this->getLocationIcon($location),
                    'color' => $this->getLocationColor($location),
                ];
            })
            ->toArray();
    }

    /**
     * Ottiene l'icona per un ticket.
     */
    private function getTicketIcon(Ticket $ticket): string
    {
        $priority = $ticket->priority->slug ?? 'unknown';

        return match ($priority) {
            'high', 'critical' => 'ticket-high',
            'medium' => 'ticket-medium',
            'low' => 'ticket-low',
            default => 'ticket'
        };
    }

    /**
     * Ottiene il colore per un ticket.
     */
    private function getTicketColor(Ticket $ticket): string
    {
        $status = $ticket->status->slug ?? 'unknown';

        return match ($status) {
            'pending' => '#ffc107',
            'assigned' => '#17a2b8',
            'in_progress' => '#007bff',
            'resolved' => '#28a745',
            'closed' => '#6c757d',
            default => '#6c757d'
        };
    }

    /**
     * Ottiene l'icona per una posizione.
     */
    private function getLocationIcon(GeoLocation $location): string
    {
        return match ($location->type) {
            'office' => 'office',
            'warehouse' => 'warehouse',
            'shop' => 'shop',
            'restaurant' => 'restaurant',
            default => 'location'
        };
    }

    /**
     * Ottiene il colore per una posizione.
     */
    private function getLocationColor(GeoLocation $location): string
    {
        return match ($location->type) {
            'office' => '#007bff',
            'warehouse' => '#6c757d',
            'shop' => '#28a745',
            'restaurant' => '#fd7e14',
            default => '#ffc107'
        };
    }

    /**
     * Esporta i dati della mappa in vari formati.
     */
    public function exportData(array $filters = [], string $format = 'json'): string
    {
        $markers = $this->getMarkers($filters);

        return match ($format) {
            'csv' => $this->exportToCsv($markers),
            'geojson' => $this->exportToGeoJson($markers),
            'kml' => $this->exportToKml($markers),
            default => json_encode($markers, JSON_PRETTY_PRINT)
        };
    }

    /**
     * Esporta i dati in formato CSV.
     */
    private function exportToCsv(array $markers): string
    {
        if (empty($markers)) {
            return '';
        }

        $csv = fopen('php://temp', 'r+');

        // Header
        if (count($markers) > 0 && is_array($markers[0])) {
            fputcsv($csv, array_keys($markers[0]));
        }

        // Dati
        foreach ($markers as $marker) {
            if (is_array($marker)) {
                /** @var array<bool|float|int|string|null> $typedMarker */
                $typedMarker = array_map(function ($value) {
                    if (is_scalar($value) || $value === null) {
                        return $value;
                    }
                    return (string) $value;
                }, $marker);
                fputcsv($csv, $typedMarker);
            }
        }

        rewind($csv);
        $content = stream_get_contents($csv);
        fclose($csv);

        return $content;
    }

    /**
     * Esporta i dati in formato GeoJSON.
     */
    private function exportToGeoJson(array $markers): string
    {
        $features = array_map(function ($marker) {
            if (! is_array($marker) || ! isset($marker['lat'], $marker['lng'])) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [0, 0],
                    ],
                    'properties' => [],
                ];
            }
            
            return [
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [(float) $marker['lng'], (float) $marker['lat']],
                ],
                'properties' => array_diff_key($marker, ['lat' => '', 'lng' => '']),
            ];
        }, $markers);

        $result = json_encode([
            'type' => 'FeatureCollection',
            'features' => $features,
        ], JSON_PRETTY_PRINT);

        return $result ?: '{}';
    }

    /**
     * Esporta i dati in formato KML.
     */
    private function exportToKml(array $markers): string
    {
        $kml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $kml .= '<kml xmlns="http://www.opengis.net/kml/2.2">'."\n";
        $kml .= '<Document>'."\n";
        $kml .= '<name>FixCity Map Export</name>'."\n";

        foreach ($markers as $marker) {
            if (! is_array($marker)) {
                continue;
            }
            
            $title = is_string($marker['title'] ?? null) ? $marker['title'] : 'Untitled';
            $description = is_string($marker['description'] ?? null) ? $marker['description'] : '';
            $lng = is_numeric($marker['lng'] ?? null) ? (string) $marker['lng'] : '0';
            $lat = is_numeric($marker['lat'] ?? null) ? (string) $marker['lat'] : '0';
            
            $kml .= '<Placemark>'."\n";
            $kml .= '<name>'.htmlspecialchars($title).'</name>'."\n";
            $kml .= '<description>'.htmlspecialchars($description).'</description>'."\n";
            $kml .= '<Point>'."\n";
            $kml .= '<coordinates>'.$lng.','.$lat.',0</coordinates>'."\n";
            $kml .= '</Point>'."\n";
            $kml .= '</Placemark>'."\n";
        }

        $kml .= '</Document>'."\n";
        $kml .= '</kml>'."\n";

        return $kml;
    }

    /**
     * Ottiene statistiche per la mappa.
     */
    public function getMapStats(array $filters = []): array
    {
        $markers = $this->getMarkers($filters);

        $stats = [
            'total_markers' => count($markers),
            'visible_markers' => count($markers),
            'filtered_markers' => count($markers),
            'by_type' => [],
            'by_status' => [],
            'by_priority' => [],
        ];

        foreach ($markers as $marker) {
            if (! is_array($marker)) {
                continue;
            }
            
            // Conteggio per tipo
            $type = is_string($marker['type'] ?? null) ? $marker['type'] : 'unknown';
            $stats['by_type'][$type] = ($stats['by_type'][$type] ?? 0) + 1;

            // Conteggio per stato (solo ticket)
            if ($type === 'ticket' && isset($marker['status']) && is_string($marker['status'])) {
                $status = $marker['status'];
                $stats['by_status'][$status] = ($stats['by_status'][$status] ?? 0) + 1;
            }

            // Conteggio per priorità (solo ticket)
            if ($type === 'ticket' && isset($marker['priority']) && is_string($marker['priority'])) {
                $priority = $marker['priority'];
                $stats['by_priority'][$priority] = ($stats['by_priority'][$priority] ?? 0) + 1;
            }
        }

        return $stats;
    }
}
