<?php

declare(strict_types=1);

namespace Modules\Geo\App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Modules\Xot\Models\XotBaseModel;

/**
 * @property int         $id
 * @property string      $name
 * @property string      $description
 * @property string      $type
 * @property string      $address
 * @property float       $latitude
 * @property float       $longitude
 * @property string      $city
 * @property string      $country
 * @property string      $postal_code
 * @property bool        $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
class GeoLocation extends XotBaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'type',
        'address',
        'latitude',
        'longitude',
        'city',
        'country',
        'postal_code',
        'is_active',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'is_active' => 'boolean',
    ];

    /**
     * Scope per posizioni attive.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope per tipo specifico.
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Scope per città specifica.
     */
    public function scopeInCity(Builder $query, string $city): Builder
    {
        return $query->where('city', $city);
    }

    /**
     * Scope per area geografica.
     */
    public function scopeInBounds(Builder $query, array $bounds): Builder
    {
        return $query->whereBetween('latitude', [$bounds['south'], $bounds['north']])
            ->whereBetween('longitude', [$bounds['west'], $bounds['east']]);
    }

    /**
     * Scope per ricerca per nome o indirizzo.
     */
    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function (Builder $query) use ($search): void {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%")
                ->orWhere('city', 'like', "%{$search}%");
        });
    }

    /**
     * Ottiene la distanza da un'altra posizione.
     */
    public function distanceTo(GeoLocation $location): float
    {
        $earthRadius = 6371; // Raggio della Terra in km

        $lat1 = deg2rad($this->latitude);
        $lon1 = deg2rad($this->longitude);
        $lat2 = deg2rad($location->latitude);
        $lon2 = deg2rad($location->longitude);

        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) * sin($dlat / 2) +
             cos($lat1) * cos($lat2) *
             sin($dlon / 2) * sin($dlon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    /**
     * Ottiene posizioni vicine.
     */
    public function nearby(float $radius = 10): Builder
    {
        return static::where('id', '!=', $this->id)
            ->where(function (Builder $query) use ($radius): void {
                // Approssimazione per performance
                $latRange = $radius / 111; // 1 grado ≈ 111 km
                $lngRange = $radius / (111 * cos(deg2rad($this->latitude)));

                $query->whereBetween('latitude', [
                    $this->latitude - $latRange,
                    $this->latitude + $latRange,
                ])->whereBetween('longitude', [
                    $this->longitude - $lngRange,
                    $this->longitude + $lngRange,
                ]);
            });
    }

    /**
     * Ottiene il tipo di posizione formattato.
     */
    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'office' => 'Ufficio',
            'warehouse' => 'Magazzino',
            'shop' => 'Negozio',
            'restaurant' => 'Ristorante',
            'hospital' => 'Ospedale',
            'school' => 'Scuola',
            'park' => 'Parco',
            'station' => 'Stazione',
            default => ucfirst($this->type),
        };
    }

    /**
     * Ottiene l'indirizzo completo formattato.
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->address,
            $this->postal_code,
            $this->city,
            $this->country,
        ]);

        return implode(', ', $parts);
    }

    /**
     * Ottiene le coordinate formattate.
     */
    public function getCoordinatesAttribute(): string
    {
        return "{$this->latitude}, {$this->longitude}";
    }

    /**
     * Ottiene l'URL per la mappa.
     */
    public function getMapUrlAttribute(): string
    {
        return "https://www.openstreetmap.org/?mlat={$this->latitude}&mlon={$this->longitude}&zoom=15";
    }

    /**
     * Ottiene l'URL per Google Maps.
     */
    public function getGoogleMapsUrlAttribute(): string
    {
        return "https://www.google.com/maps?q={$this->latitude},{$this->longitude}";
    }
}

