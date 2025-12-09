<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
=======
use Override;
use Modules\User\Models\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
>>>>>>> be08416 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Geo\Contracts\HasGeolocation;

use function Safe\json_encode;

/**
<<<<<<< HEAD
 * @property Address|null                                $address
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property string                                      $formatted_address
 * @property float|null                                  $latitude
 * @property float|null                                  $longitude
 * @property Model|\Eloquent                             $linked
 * @property PlaceType|null                              $placeType
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static Builder<static>|Place newModelQuery()
 * @method static Builder<static>|Place newQuery()
 * @method static Builder<static>|Place query()
 *
=======
 * @property-read Address|null $address
 * @property-read Profile|null $creator
 * @property-read string $formatted_address
 * @property-read float|null $latitude
 * @property-read float|null $longitude
 * @property-read Model $linked
 * @property-read PlaceType|null $placeType
 * @property-read Profile|null $updater
 * @method static Builder<static>|Place newModelQuery()
 * @method static Builder<static>|Place newQuery()
 * @method static Builder<static>|Place query()
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property string|null $nearest_street
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $post_type
 * @method static Builder<static>|Place whereAddress($value)
 * @method static Builder<static>|Place whereCreatedAt($value)
 * @method static Builder<static>|Place whereCreatedBy($value)
 * @method static Builder<static>|Place whereDeletedBy($value)
 * @method static Builder<static>|Place whereFormattedAddress($value)
 * @method static Builder<static>|Place whereId($value)
 * @method static Builder<static>|Place whereLatitude($value)
 * @method static Builder<static>|Place whereLongitude($value)
 * @method static Builder<static>|Place whereModelId($value)
 * @method static Builder<static>|Place whereModelType($value)
 * @method static Builder<static>|Place whereNearestStreet($value)
 * @method static Builder<static>|Place wherePostType($value)
 * @method static Builder<static>|Place whereUpdatedAt($value)
 * @method static Builder<static>|Place whereUpdatedBy($value)
 * @mixin IdeHelperPlace
>>>>>>> be08416 (.)
 * @mixin \Eloquent
 */
class Place extends BaseModel implements HasGeolocation
{
    /**
     * List of address components used in the application.
     *
     * @var array<string>
     */
    public static array $address_components = [
        'premise',
        'locality',
        'postal_town',
        'administrative_area_level_3',
        'administrative_area_level_2',
        'administrative_area_level_1',
        'country',
        'street_number',
        'route',
        'postal_code',
        'point_of_interest',
        'political',
    ];

    protected $fillable = [
        'id',
        'post_id',
        'post_type',
        'model_id',
        'model_type',
        'premise',
        'locality',
        'postal_town',
        'administrative_area_level_3',
        'administrative_area_level_2',
        'administrative_area_level_1',
        'country',
        'street_number',
        'route',
        'postal_code',
        'googleplace_url',
        'point_of_interest',
        'political',
        'campground',
        'locality_short',
        'administrative_area_level_2_short',
        'administrative_area_level_1_short',
        'country_short',
        'latlng',
        'latitude',
        'longitude',
        'formatted_address',
        'nearest_street',
        'extra_data',
    ];

    /**
<<<<<<< HEAD
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
            'extra_data' => 'array',
        ];
    }

    /**
>>>>>>> be08416 (.)
     * Get the linked model.
     */
    public function linked(): MorphTo
    {
        return $this->morphTo('post');
    }

    /**
     * Get the place type.
     */
    public function placeType(): BelongsTo
    {
        return $this->belongsTo(PlaceType::class, 'type_id');
    }

    /**
     * Get the address.
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

<<<<<<< HEAD
    #[\Override]
    public function getLatitude(): ?float
    {
        /* @phpstan-ignore-line */ return $this->latitude;
    }

    #[\Override]
    public function getLongitude(): ?float
    {
        /* @phpstan-ignore-line */ return $this->longitude;
    }

    #[\Override]
=======
    #[Override]
    public function getLatitude(): null|float
    {
        return $this->latitude;
    }

    #[Override]
    public function getLongitude(): null|float
    {
        return $this->longitude;
    }

    #[Override]
>>>>>>> be08416 (.)
    public function getFormattedAddress(): string
    {
        return (string) ($this->formatted_address ?? $this->address->formatted_address ?? '');
    }

<<<<<<< HEAD
    public function getLatitudeAttribute(): ?float
    {
        if (! isset($this->attributes['latitude'])) {
=======
    public function getLatitudeAttribute(): null|float
    {
        if (!isset($this->attributes['latitude'])) {
>>>>>>> be08416 (.)
            return null;
        }

        $latitude = $this->attributes['latitude'];
<<<<<<< HEAD
        if (! is_numeric($latitude)) {
=======
        if (!is_numeric($latitude)) {
>>>>>>> be08416 (.)
            return null;
        }

        $latitude = (float) $latitude;

        return is_finite($latitude) && $latitude >= -90 && $latitude <= 90 ? $latitude : null;
    }

<<<<<<< HEAD
    public function getLongitudeAttribute(): ?float
    {
        if (! isset($this->attributes['longitude'])) {
=======
    public function getLongitudeAttribute(): null|float
    {
        if (!isset($this->attributes['longitude'])) {
>>>>>>> be08416 (.)
            return null;
        }

        $longitude = $this->attributes['longitude'];
<<<<<<< HEAD
        if (! is_numeric($longitude)) {
=======
        if (!is_numeric($longitude)) {
>>>>>>> be08416 (.)
            return null;
        }

        $longitude = (float) $longitude;

        return is_finite($longitude) && $longitude >= -180 && $longitude <= 180 ? $longitude : null;
    }

    public function getFormattedAddressAttribute(): string
    {
        $address = $this->attributes['formatted_address'] ?? '';

        return is_string($address) ? $address : '';
    }

<<<<<<< HEAD
    #[\Override]
    public function hasValidCoordinates(): bool
    {
        return null !== $this->latitude
            && null !== $this->longitude
            && $this->latitude >= -90
            && $this->latitude <= 90
            && $this->longitude >= -180
            && $this->longitude <= 180;
    }

    #[\Override]
    public function getMapIcon(): ?string
    {
        $slug = $this->placeType->slug ?? null;
        $type = is_string($slug) ? $slug : 'default';
        $markerConfig = config("geo.markers.types.{$type}");

        if (! is_array($markerConfig)) {
            $markerConfig = config('geo.markers.types.default');
        }

        if (! is_array($markerConfig)) {
=======
    #[Override]
    public function hasValidCoordinates(): bool
    {
        return (
            $this->latitude !== null &&
            $this->longitude !== null &&
            $this->latitude >= -90 &&
            $this->latitude <= 90 &&
            $this->longitude >= -180 &&
            $this->longitude <= 180
        );
    }

    #[Override]
    public function getMapIcon(): null|string
    {
        $type = $this->placeType->slug ?? 'default';
        $markerConfig = config("geo.markers.types.{$type}");

        if (!is_array($markerConfig)) {
            $markerConfig = config('geo.markers.types.default');
        }

        if (!is_array($markerConfig)) {
>>>>>>> be08416 (.)
            return null;
        }

        $icon = $markerConfig['icon'] ?? null;

        if (is_array($icon)) {
            return json_encode($icon);
        }

        return is_string($icon) ? $icon : null;
    }

<<<<<<< HEAD
    #[\Override]
    public function getLocationType(): ?string
    {
        $name = $this->placeType->name ?? null;

        return is_string($name) ? $name : null;
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
            'extra_data' => 'array',
        ];
=======
    #[Override]
    public function getLocationType(): null|string
    {
        return $this->placeType->name ?? null;
>>>>>>> be08416 (.)
    }
}
