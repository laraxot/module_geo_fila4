<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Modules\Geo\Enums\AddressTypeEnum;
<<<<<<< HEAD
<<<<<<< HEAD

/**
 * Class Address.
 *
 * Implementazione di Schema.org PostalAddress
 *
 * @property int                                         $id
 * @property string|null                                 $model_type
 * @property string|null                                 $model_id
 * @property string|null                                 $name                        Nome identificativo dell'indirizzo
 * @property string|null                                 $description                 Descrizione opzionale
 * @property string|null                                 $route                       Via/Piazza
 * @property string|null                                 $street_number               Numero civico
 * @property string|null                                 $locality                    Comune/Città
 * @property string|null                                 $administrative_area_level_3 Provincia
 * @property string|null                                 $administrative_area_level_2 Regione
 * @property string|null                                 $administrative_area_level_1 Stato/Paese
 * @property string|null                                 $country                     Codice paese ISO
 * @property string|null                                 $postal_code                 CAP
 * @property string|null                                 $formatted_address
 * @property string|null                                 $place_id                    ID Google Places
 * @property float|null                                  $latitude
 * @property float|null                                  $longitude
 * @property AddressTypeEnum|null                        $type                        Tipo indirizzo (home, work, etc.)
 * @property bool                                        $is_primary
 * @property array<array-key, mixed>|null                $extra_data
 * @property Carbon|null                                 $created_at
 * @property Carbon|null                                 $updated_at
 * @property string|null                                 $updated_by
 * @property string|null                                 $created_by
 * @property string|null                                 $deleted_at
 * @property string|null                                 $deleted_by
 * @property Model|\Eloquent|null                        $addressable
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property string                                      $full_address
 * @property string                                      $street_address
 * @property Model|\Eloquent|null                        $model
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
=======
use Override;
=======
>>>>>>> 0746367 (.)

/**
 * Class Address.
 *
 * Implementazione di Schema.org PostalAddress
 *
<<<<<<< HEAD
 * @property int $id
 * @property string|null $model_type
 * @property string|null $model_id
 * @property string|null $name Nome identificativo dell'indirizzo
 * @property string|null $description Descrizione opzionale
 * @property string|null $route Via/Piazza
 * @property string|null $street_number Numero civico
 * @property string|null $locality Comune/Città
 * @property string|null $administrative_area_level_3 Provincia
 * @property string|null $administrative_area_level_2 Regione
 * @property string|null $administrative_area_level_1 Stato/Paese
 * @property string|null $country Codice paese ISO
 * @property string|null $postal_code CAP
 * @property string|null $formatted_address
 * @property string|null $place_id ID Google Places
 * @property float|null $latitude
 * @property float|null $longitude
 * @property AddressTypeEnum|null $type Tipo indirizzo (home, work, etc.)
 * @property bool $is_primary
 * @property array<array-key, mixed>|null $extra_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Model|\Eloquent|null $addressable
 * @property-read \Modules\Quaeris\Models\Profile|null $creator
 * @property-read string $full_address
 * @property-read string $street_address
 * @property-read Model|\Eloquent|null $model
 * @property-read \Modules\Quaeris\Models\Profile|null $updater
>>>>>>> 1bb689f (.)
=======
 * @property int                                         $id
 * @property string|null                                 $model_type
 * @property string|null                                 $model_id
 * @property string|null                                 $name                        Nome identificativo dell'indirizzo
 * @property string|null                                 $description                 Descrizione opzionale
 * @property string|null                                 $route                       Via/Piazza
 * @property string|null                                 $street_number               Numero civico
 * @property string|null                                 $locality                    Comune/Città
 * @property string|null                                 $administrative_area_level_3 Provincia
 * @property string|null                                 $administrative_area_level_2 Regione
 * @property string|null                                 $administrative_area_level_1 Stato/Paese
 * @property string|null                                 $country                     Codice paese ISO
 * @property string|null                                 $postal_code                 CAP
 * @property string|null                                 $formatted_address
 * @property string|null                                 $place_id                    ID Google Places
 * @property float|null                                  $latitude
 * @property float|null                                  $longitude
 * @property AddressTypeEnum|null                        $type                        Tipo indirizzo (home, work, etc.)
 * @property bool                                        $is_primary
 * @property array<array-key, mixed>|null                $extra_data
 * @property Carbon|null                                 $created_at
 * @property Carbon|null                                 $updated_at
 * @property string|null                                 $updated_by
 * @property string|null                                 $created_by
 * @property string|null                                 $deleted_at
 * @property string|null                                 $deleted_by
 * @property Model|\Eloquent|null                        $addressable
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property string                                      $full_address
 * @property string                                      $street_address
 * @property Model|\Eloquent|null                        $model
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> 0746367 (.)
 *
 * @method static Builder<static>|Address nearby(float $latitude, float $longitude, float $radiusKm = 10)
 * @method static Builder<static>|Address newModelQuery()
 * @method static Builder<static>|Address newQuery()
 * @method static Builder<static>|Address ofType($type)
 * @method static Builder<static>|Address primary()
 * @method static Builder<static>|Address query()
 * @method static Builder<static>|Address whereAdministrativeAreaLevel1($value)
 * @method static Builder<static>|Address whereAdministrativeAreaLevel2($value)
 * @method static Builder<static>|Address whereAdministrativeAreaLevel3($value)
 * @method static Builder<static>|Address whereCountry($value)
 * @method static Builder<static>|Address whereCreatedAt($value)
 * @method static Builder<static>|Address whereCreatedBy($value)
 * @method static Builder<static>|Address whereDeletedAt($value)
 * @method static Builder<static>|Address whereDeletedBy($value)
 * @method static Builder<static>|Address whereDescription($value)
 * @method static Builder<static>|Address whereExtraData($value)
 * @method static Builder<static>|Address whereFormattedAddress($value)
 * @method static Builder<static>|Address whereId($value)
 * @method static Builder<static>|Address whereIsPrimary($value)
 * @method static Builder<static>|Address whereLatitude($value)
 * @method static Builder<static>|Address whereLocality($value)
 * @method static Builder<static>|Address whereLongitude($value)
 * @method static Builder<static>|Address whereModelId($value)
 * @method static Builder<static>|Address whereModelType($value)
 * @method static Builder<static>|Address whereName($value)
 * @method static Builder<static>|Address wherePlaceId($value)
 * @method static Builder<static>|Address wherePostalCode($value)
 * @method static Builder<static>|Address whereRoute($value)
 * @method static Builder<static>|Address whereStreetNumber($value)
 * @method static Builder<static>|Address whereType($value)
 * @method static Builder<static>|Address whereUpdatedAt($value)
 * @method static Builder<static>|Address whereUpdatedBy($value)
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\AddressFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
=======
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
 * @mixin \Eloquent
 */
class Address extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'model_type',
        'model_id',
        'name',
        'description',
        'route',
        'street_number',
        'locality',
        'administrative_area_level_3', // comune
        'administrative_area_level_2', // provincia
        'administrative_area_level_1', // regione
        'country', // Stato/Paese
        'postal_code',
        'formatted_address',
        'place_id',
        'latitude',
        'longitude',
        'type',
        'is_primary',
        'extra_data',
    ];

    /**
     * Get the parent model.
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Relazione polimorfica (alternativa con nome più descrittivo).
=======
     * Relazione polimorfica (alternativa con nome più descrittivo)
>>>>>>> 1bb689f (.)
=======
     * Relazione polimorfica (alternativa con nome più descrittivo).
>>>>>>> 0746367 (.)
     */
    public function addressable(): MorphTo
    {
        return $this->morphTo('model');
    }

    /*
     * Get the city relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * public function city(): BelongsTo
     * {
     * return $this->belongsTo(City::class, 'locality', 'name');
     * }
     */
    /*
     * Get the province relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * public function provincia(): BelongsTo
     * {
     * return $this->belongsTo(Provincia::class, 'administrative_area_level_2', 'name');
     * }
     */
    /*
     * Get the region relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * public function regione(): BelongsTo
     * {
     * return $this->belongsTo(Regione::class, 'administrative_area_level_1', 'name');
     * }
     */
    public function getRegione(): ?array
    {
        /** @phpstan-ignore method.unresolvableReturnType */
        $res = Comune::select('regione')
            ->distinct()
            ->orderBy('regione->nome')
            ->where('regione->codice', $this->administrative_area_level_1)
            ->get()
<<<<<<< HEAD
<<<<<<< HEAD
            /* @phpstan-ignore argument.unresolvableType */
            ->map(function ($item) {
                $regione = $item->regione;
                if (! is_array($regione) || ! isset($regione['codice'], $regione['nome'])) {
                    return;
=======
            /** @phpstan-ignore argument.unresolvableType */
            ->map(function ($item) {
                $regione = $item->regione;
                if (! is_array($regione) || ! isset($regione['codice'], $regione['nome'])) {
                    return null;
>>>>>>> 1bb689f (.)
=======
            /* @phpstan-ignore argument.unresolvableType */
            ->map(function ($item) {
                $regione = $item->regione;
                if (! is_array($regione) || ! isset($regione['codice'], $regione['nome'])) {
                    return;
>>>>>>> 0746367 (.)
                }

                return ['codice' => $regione['codice'], 'nome' => $regione['nome']];
            })
            ->filter();

        return $res->first();
    }

    public function getProvincia(): ?array
    {
        /** @phpstan-ignore method.unresolvableReturnType */
        $res = Comune::select('provincia')
            ->distinct()
            ->orderBy('provincia->nome')
            ->where('provincia->codice', $this->administrative_area_level_2)
            ->get()
<<<<<<< HEAD
<<<<<<< HEAD
            /* @phpstan-ignore argument.unresolvableType */
            ->map(fn ($item) => [
                /* @phpstan-ignore offsetAccess.notFound */
                'codice' => $item->provincia['codice'],
                /* @phpstan-ignore offsetAccess.notFound */
=======
            /** @phpstan-ignore argument.unresolvableType */
=======
            /* @phpstan-ignore argument.unresolvableType */
>>>>>>> 0746367 (.)
            ->map(fn ($item) => [
                /* @phpstan-ignore offsetAccess.notFound */
                'codice' => $item->provincia['codice'],
<<<<<<< HEAD
                /** @phpstan-ignore offsetAccess.notFound */
>>>>>>> 1bb689f (.)
=======
                /* @phpstan-ignore offsetAccess.notFound */
>>>>>>> 0746367 (.)
                'nome' => $item->provincia['nome'],
            ]);

        return $res->first();
    }

    public function getLocality(): ?array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore-next-line */
=======
        /** @phpstan-ignore-next-line */
>>>>>>> 1bb689f (.)
=======
        /* @phpstan-ignore-next-line */
>>>>>>> 0746367 (.)
        return Comune::where('codice', $this->locality)
            ->distinct()
            ->first()
            ?->toArray();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Getter per l'indirizzo completo in formato italiano.
=======
     * Getter per l'indirizzo completo in formato italiano
>>>>>>> 1bb689f (.)
=======
     * Getter per l'indirizzo completo in formato italiano.
>>>>>>> 0746367 (.)
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
<<<<<<< HEAD
<<<<<<< HEAD
            is_string($this->route) && is_string($this->street_number) ? $this->route.('' !== $this->street_number ? ' '.$this->street_number : '') : null,
=======
            $this->route.($this->street_number ? ' '.$this->street_number : ''),
>>>>>>> 1bb689f (.)
=======
            is_string($this->route) && is_string($this->street_number) ? $this->route.('' !== $this->street_number ? ' '.$this->street_number : '') : null,
>>>>>>> 0746367 (.)
            $this->locality,
            $this->administrative_area_level_3, // Provincia
            $this->administrative_area_level_2, // Regione
            $this->postal_code,
            $this->country,
<<<<<<< HEAD
<<<<<<< HEAD
        ], fn ($part) => null !== $part && '' !== $part);
=======
        ]);
>>>>>>> 1bb689f (.)
=======
        ], fn ($part) => null !== $part && '' !== $part);
>>>>>>> 0746367 (.)

        return implode(', ', $parts);
    }

    public function getFullAddress(): ?string
    {
        $parts = array_filter([
            $this->route.($this->street_number ? ' '.$this->street_number : ''),
            $this->locality,
            $this->administrative_area_level_3, // Provincia
            $this->administrative_area_level_2, // Regione
            $this->postal_code,
            $this->country,
        ]);

        return implode(', ', $parts);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Getter per l'indirizzo strada completo.
     */
    public function getStreetAddressAttribute(): string
    {
        $route = $this->route ?? '';
        $streetNumber = $this->street_number ?? '';

        return trim($route.' '.$streetNumber);
=======
     * Getter per l'indirizzo strada completo
     */
    public function getStreetAddressAttribute(): string
    {
        return trim(($this->route ?? '').' '.($this->street_number ?? ''));
>>>>>>> 1bb689f (.)
=======
     * Getter per l'indirizzo strada completo.
     */
    public function getStreetAddressAttribute(): string
    {
        $route = $this->route ?? '';
        $streetNumber = $this->street_number ?? '';

        return trim($route.' '.$streetNumber);
>>>>>>> 0746367 (.)
    }

    /**
     * Get the formatted address.
     */
    public function getFormattedAddressAttribute(?string $value): ?string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (null !== $value) {
=======
        if ($value) {
>>>>>>> 1bb689f (.)
=======
        if (null !== $value) {
>>>>>>> 0746367 (.)
            return $value;
        }

        $parts = [];

        // Indirizzo stradale
        if ($this->route) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
            $route = $this->route;
            $streetNumber = $this->street_number;
            $streetAddress = is_string($route) && is_string($streetNumber) ? trim($route.' '.$streetNumber) : '';
            if ('' !== $streetAddress) {
                $parts[] = $streetAddress;
            }
<<<<<<< HEAD
=======
            $parts[] = $this->getStreetAddressAttribute();
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
        }

        // Località e provincia (formato italiano)
        $localityParts = [];
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->postal_code && is_string($this->postal_code)) {
            $localityParts[] = $this->postal_code;
        }

        if ($this->locality && is_string($this->locality)) {
            $localityParts[] = $this->locality;

            // Per indirizzi italiani, aggiungiamo la sigla provincia
            if ('IT' === ($this->country ?? '') && $this->administrative_area_level_3 && is_string($this->administrative_area_level_3)) {
=======
        if ($this->postal_code) {
=======
        if ($this->postal_code && is_string($this->postal_code)) {
>>>>>>> 0746367 (.)
            $localityParts[] = $this->postal_code;
        }

        if ($this->locality && is_string($this->locality)) {
            $localityParts[] = $this->locality;

            // Per indirizzi italiani, aggiungiamo la sigla provincia
<<<<<<< HEAD
            if ($this->country === 'IT' && $this->administrative_area_level_3) {
>>>>>>> 1bb689f (.)
=======
            if ('IT' === ($this->country ?? '') && $this->administrative_area_level_3 && is_string($this->administrative_area_level_3)) {
>>>>>>> 0746367 (.)
                // Se è un'implementazione reale, potremmo derivare la sigla dalla provincia
                $provinciaSigla = $this->extra_data['provincia_sigla'] ?? null;
                if ($provinciaSigla && is_string($provinciaSigla)) {
                    $localityParts[] = "({$provinciaSigla})";
                }
            }
        }

        if (! empty($localityParts)) {
            $parts[] = implode(' ', $localityParts);
        }

        // Regione
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->administrative_area_level_2 && is_string($this->administrative_area_level_2)) {
=======
        if ($this->administrative_area_level_2) {
>>>>>>> 1bb689f (.)
=======
        if ($this->administrative_area_level_2 && is_string($this->administrative_area_level_2)) {
>>>>>>> 0746367 (.)
            $parts[] = $this->administrative_area_level_2;
        }

        // Paese
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->country && is_string($this->country)) {
            $countryName = ($this->administrative_area_level_1 ?? $this->country) ?? '';
            $parts[] = strtoupper(is_string($countryName) ? $countryName : '');
=======
        if ($this->country) {
            $countryName = $this->administrative_area_level_1 ?? $this->country;
            $parts[] = strtoupper($countryName);
>>>>>>> 1bb689f (.)
=======
        if ($this->country && is_string($this->country)) {
            $countryName = ($this->administrative_area_level_1 ?? $this->country) ?? '';
            $parts[] = strtoupper(is_string($countryName) ? $countryName : '');
>>>>>>> 0746367 (.)
        }

        return implode("\n", $parts);
    }

    /**
     * Get the latitude of the address.
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * Get the longitude of the address.
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * Get the formatted address required by HasGeolocation interface.
     */
    public function getFormattedAddress(): string
    {
        return $this->formatted_address ?? '';
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Restituisce i dati in formato Schema.org PostalAddress.
=======
     * Restituisce i dati in formato Schema.org PostalAddress
>>>>>>> 1bb689f (.)
=======
     * Restituisce i dati in formato Schema.org PostalAddress.
>>>>>>> 0746367 (.)
     *
     * @return array<string, mixed>
     */
    public function toSchemaOrg(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'PostalAddress',
            'name' => $this->name,
            'description' => $this->description,
            'streetAddress' => $this->getStreetAddressAttribute(),
            'addressLocality' => $this->locality,
            'addressSubregion' => $this->administrative_area_level_3, // Provincia
            'addressRegion' => $this->administrative_area_level_2, // Regione
            'addressCountry' => $this->country,
            'postalCode' => $this->postal_code,
        ];
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Scope per cercare indirizzi nelle vicinanze.
=======
     * Scope per cercare indirizzi nelle vicinanze
>>>>>>> 1bb689f (.)
=======
     * Scope per cercare indirizzi nelle vicinanze.
>>>>>>> 0746367 (.)
     */
    public function scopeNearby(Builder $query, float $latitude, float $longitude, float $radiusKm = 10): Builder
    {
        return $query
            ->selectRaw('
            *,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance
        ', [$latitude, $longitude, $latitude])
            ->having('distance', '<', $radiusKm)
            ->orderBy('distance');
    }

    /**
     * Scope a query to only include primary addresses.
     */
    public function scopePrimary(Builder $query): Builder
    {
        return $query->where('is_primary', true);
    }

    /**
     * Scope a query to filter by address type.
     */
    public function scopeOfType(Builder $query, string|AddressTypeEnum $type): Builder
    {
        return $query->where('type', $type instanceof AddressTypeEnum ? $type->value : $type);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 1bb689f (.)
=======
    #[\Override]
>>>>>>> 0746367 (.)
    protected function casts(): array
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'is_primary' => 'boolean',
            'extra_data' => 'array',
            'type' => AddressTypeEnum::class,
        ];
    }
}
