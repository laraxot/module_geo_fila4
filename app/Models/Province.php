<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Sushi\Sushi;

/**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
 * @property int|null                                    $region_id
 * @property int                                         $id
 * @property string|null                                 $name
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property Collection<int, Locality>                   $localities
 * @property int|null                                    $localities_count
 * @property Region|null                                 $region
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
<<<<<<< HEAD
=======
 * @property int|null $region_id
 * @property int $id
 * @property string|null $name
 * @property-read \Modules\Quaeris\Models\Profile|null $creator
 * @property-read Collection<int, \Modules\Geo\Models\Locality> $localities
 * @property-read int|null $localities_count
 * @property-read \Modules\Geo\Models\Region|null $region
 * @property-read \Modules\Quaeris\Models\Profile|null $updater
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
 *
 * @method static Builder<static>|Province newModelQuery()
 * @method static Builder<static>|Province newQuery()
 * @method static Builder<static>|Province query()
 * @method static Builder<static>|Province whereId($value)
 * @method static Builder<static>|Province whereName($value)
 * @method static Builder<static>|Province whereRegionId($value)
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\ProvinceFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
=======
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
 * @mixin \Eloquent
 */
class Province extends BaseModel
{
    use \Modules\Xot\Models\Traits\HasXotFactory;
    use Sushi;

    protected array $schema = [
        'region_id' => 'integer',
        'id' => 'integer',
        'name' => 'string',
    ];

    public function getRows(): array
    {
        $rows = Comune::select('regione->codice as region_id', 'provincia->codice as id', 'provincia->nome as name')
            ->distinct()
            ->orderBy('provincia->nome')
            ->get();

        return $rows->toArray();
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class);
    }

    public static function getOptions(Get $get): array
    {
        $region = $get('administrative_area_level_1') ?? $get('region');

        return self::where('region_id', $region)
            ->orderBy('name')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }
}
