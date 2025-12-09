<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Modules\Geo\Enums\AddressTypeEnum;

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
 *
 * @method static Builder<static>|Address nearby(float $latitude, float $longitude, float $radiusKm = 10)
=======
use Override;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Geo\Contracts\HasGeolocation;
use Modules\Geo\Enums\AddressTypeEnum;

/**
 * Class Address
 *
 * Implementazione di Schema.org PostalAddress
 *
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $route
 * @property string|null $street_number
 * @property string|null $locality
 * @property string|null $administrative_area_level_3
 * @property string|null $administrative_area_level_2
 * @property string|null $administrative_area_level_1
 * @property string|null $country
 * @property string|null $postal_code
 * @property string|null $formatted_address
 * @property string|null $place_id
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $type
 * @property bool $is_primary
 * @property array|null $extra_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * // implements HasGeolocation
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property-read Model|\Eloquent|null $addressable
 * @property-read Profile|null $creator
 * @property-read string $full_address
 * @property-read string $street_address
 * @property-read Model|\Eloquent|null $model
 * @property-read Profile|null $updater
 * @method static Builder<static>|Address nearby(float $latitude, float $longitude, float $radiusKm = '10')
>>>>>>> be08416 (.)
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
<<<<<<< HEAD
 *
=======
 * @mixin IdeHelperAddress
>>>>>>> be08416 (.)
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
<<<<<<< HEAD
     * Get the parent model.
=======
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[Override]
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

    /**
     * Get the parent model.
     *
     * @return MorphTo
>>>>>>> be08416 (.)
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    /**
<<<<<<< HEAD
     * Relazione polimorfica (alternativa con nome più descrittivo).
=======
     * Relazione polimorfica (alternativa con nome più descrittivo)
     *
     * @return MorphTo
>>>>>>> be08416 (.)
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
<<<<<<< HEAD
    public function getRegione(): ?array
=======
    public function getRegione(): null|array
>>>>>>> be08416 (.)
    {
        /** @phpstan-ignore method.unresolvableReturnType */
        $res = Comune::select('regione')
            ->distinct()
            ->orderBy('regione->nome')
            ->where('regione->codice', $this->administrative_area_level_1)
            ->get()
<<<<<<< HEAD
            /* @phpstan-ignore argument.unresolvableType */
            ->map(function ($item) {
                $regione = $item->regione;
                if (! is_array($regione) || ! isset($regione['codice'], $regione['nome'])) {
                    return null;
                }

=======
            /** @phpstan-ignore argument.unresolvableType */
            ->map(function ($item) {
                $regione = $item->regione;
                if (!is_array($regione) || !isset($regione['codice'], $regione['nome'])) {
                    return null;
                }
>>>>>>> be08416 (.)
                return ['codice' => $regione['codice'], 'nome' => $regione['nome']];
            })
            ->filter();

        return $res->first();
    }

<<<<<<< HEAD
    public function getProvincia(): ?array
=======
    public function getProvincia(): null|array
>>>>>>> be08416 (.)
    {
        /** @phpstan-ignore method.unresolvableReturnType */
        $res = Comune::select('provincia')
            ->distinct()
            ->orderBy('provincia->nome')
            ->where('provincia->codice', $this->administrative_area_level_2)
            ->get()
<<<<<<< HEAD
            /* @phpstan-ignore argument.unresolvableType */
            ->map(fn ($item) => [
                /* @phpstan-ignore offsetAccess.notFound */
                'codice' => $item->provincia['codice'],
                /* @phpstan-ignore offsetAccess.notFound */
                'nome' => $item->provincia['nome'],
            ]);

        return $res->first();
    }

    public function getLocality(): ?array
    {
        /* @phpstan-ignore-next-line */
        return Comune::where('codice', $this->locality)
            ->distinct()
            ->first()
            ?->toArray();
    }

    /**
     * Getter per l'indirizzo completo in formato italiano.
=======
            /** @phpstan-ignore argument.unresolvableType */
            ->map(fn ($item) => [
                    /** @phpstan-ignore offsetAccess.notFound */
                    'codice' => $item->provincia['codice'],
                    /** @phpstan-ignore offsetAccess.notFound */
                    'nome' => $item->provincia['nome'],
                ]);
        return $res->first();
    }

    public function getLocality(): null|array
    {
        /** @phpstan-ignore-next-line */
        $res = Comune::where('codice', $this->locality)
            ->distinct()
            ->first()
            ?->toArray();
        return $res;
    }

    /**
     * Getter per l'indirizzo completo in formato italiano
     *
     * @return string
>>>>>>> be08416 (.)
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
<<<<<<< HEAD
            $this->route.($this->street_number ? ' '.$this->street_number : ''),
=======
            $this->route . ($this->street_number ? (' ' . $this->street_number) : ''),
>>>>>>> be08416 (.)
            $this->locality,
            $this->administrative_area_level_3, // Provincia
            $this->administrative_area_level_2, // Regione
            $this->postal_code,
            $this->country,
        ]);

        return implode(', ', $parts);
    }

<<<<<<< HEAD
    public function getFullAddress(): ?string
    {
        $parts = array_filter([
            $this->route.($this->street_number ? ' '.$this->street_number : ''),
=======
    public function getFullAddress(): null|string
    {
        $parts = array_filter([
            $this->route . ($this->street_number ? (' ' . $this->street_number) : ''),
>>>>>>> be08416 (.)
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
     * Getter per l'indirizzo strada completo.
     */
    public function getStreetAddressAttribute(): string
    {
        return trim(($this->route ?? '').' '.($this->street_number ?? ''));
=======
     * Getter per l'indirizzo strada completo
     *
     * @return string
     */
    public function getStreetAddressAttribute(): string
    {
        return trim(($this->route ?? '') . ' ' . ($this->street_number ?? ''));
>>>>>>> be08416 (.)
    }

    /**
     * Get the formatted address.
<<<<<<< HEAD
     */
    public function getFormattedAddressAttribute(?string $value): ?string
=======
     *
     * @return string
     */
    public function getFormattedAddressAttribute(null|string $value): null|string
>>>>>>> be08416 (.)
    {
        if ($value) {
            return $value;
        }

        $parts = [];

        // Indirizzo stradale
        if ($this->route) {
            $parts[] = $this->getStreetAddressAttribute();
        }

        // Località e provincia (formato italiano)
        $localityParts = [];
        if ($this->postal_code) {
            $localityParts[] = $this->postal_code;
        }

        if ($this->locality) {
            $localityParts[] = $this->locality;

            // Per indirizzi italiani, aggiungiamo la sigla provincia
<<<<<<< HEAD
            if ('IT' === $this->country && $this->administrative_area_level_3) {
                // Se è un'implementazione reale, potremmo derivare la sigla dalla provincia
                $provinciaSigla = $this->extra_data['provincia_sigla'] ?? null;
                if ($provinciaSigla && is_string($provinciaSigla)) {
=======
            if ($this->country === 'IT' && $this->administrative_area_level_3) {
                // Se è un'implementazione reale, potremmo derivare la sigla dalla provincia
                $provinciaSigla = $this->extra_data['provincia_sigla'] ?? null;
                if ($provinciaSigla) {
>>>>>>> be08416 (.)
                    $localityParts[] = "({$provinciaSigla})";
                }
            }
        }

<<<<<<< HEAD
        if (! empty($localityParts)) {
=======
        if (!empty($localityParts)) {
>>>>>>> be08416 (.)
            $parts[] = implode(' ', $localityParts);
        }

        // Regione
        if ($this->administrative_area_level_2) {
            $parts[] = $this->administrative_area_level_2;
        }

        // Paese
        if ($this->country) {
            $countryName = $this->administrative_area_level_1 ?? $this->country;
            $parts[] = strtoupper($countryName);
        }

        return implode("\n", $parts);
    }

    /**
     * Get the latitude of the address.
<<<<<<< HEAD
     */
    public function getLatitude(): ?float
=======
     *
     * @return float|null
     */
    public function getLatitude(): null|float
>>>>>>> be08416 (.)
    {
        return $this->latitude;
    }

    /**
     * Get the longitude of the address.
<<<<<<< HEAD
     */
    public function getLongitude(): ?float
=======
     *
     * @return float|null
     */
    public function getLongitude(): null|float
>>>>>>> be08416 (.)
    {
        return $this->longitude;
    }

    /**
     * Get the formatted address required by HasGeolocation interface.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> be08416 (.)
     */
    public function getFormattedAddress(): string
    {
        return $this->formatted_address ?? '';
    }

    /**
<<<<<<< HEAD
     * Restituisce i dati in formato Schema.org PostalAddress.
=======
     * Restituisce i dati in formato Schema.org PostalAddress
>>>>>>> be08416 (.)
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
     * Scope per cercare indirizzi nelle vicinanze.
     */
    public function scopeNearby(Builder $query, float $latitude, float $longitude, float $radiusKm = 10): Builder
=======
     * Scope per cercare indirizzi nelle vicinanze
     *
     * @param Builder $query
     * @param float $latitude
     * @param float $longitude
     * @param float $radiusKm
     * @return Builder
     */
    public function scopeNearby($query, float $latitude, float $longitude, float $radiusKm = 10)
>>>>>>> be08416 (.)
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
<<<<<<< HEAD
     */
    public function scopePrimary(Builder $query): Builder
=======
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePrimary($query)
>>>>>>> be08416 (.)
    {
        return $query->where('is_primary', true);
    }

    /**
     * Scope a query to filter by address type.
<<<<<<< HEAD
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
    #[\Override]
    protected function casts(): array
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'is_primary' => 'boolean',
            'extra_data' => 'array',
            'type' => AddressTypeEnum::class,
        ];
=======
     *
     * @param Builder $query
     * @param string|AddressTypeEnum $type
     * @return Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', ($type instanceof AddressTypeEnum) ? $type->value : $type);
>>>>>>> be08416 (.)
    }
}
