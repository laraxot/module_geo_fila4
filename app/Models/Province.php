<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
<<<<<<< HEAD
use Modules\Geo\Database\Factories\ProvinceFactory;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Models\Traits\HasXotFactory;
use Sushi\Sushi;

/**
 * @property int|null                  $region_id
 * @property int                       $id
 * @property string|null               $name
 * @property ProfileContract|null      $creator
 * @property Collection<int, Locality> $localities
 * @property int|null                  $localities_count
 * @property Region|null               $region
 * @property ProfileContract|null      $updater
=======
use Sushi\Sushi;

/**
 * @property int|null                                    $region_id
 * @property int                                         $id
 * @property string|null                                 $name
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property Collection<int, Locality>                   $localities
 * @property int|null                                    $localities_count
 * @property Region|null                                 $region
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> 078f9da (.)
 *
 * @method static Builder<static>|Province newModelQuery()
 * @method static Builder<static>|Province newQuery()
 * @method static Builder<static>|Province query()
 * @method static Builder<static>|Province whereId($value)
 * @method static Builder<static>|Province whereName($value)
 * @method static Builder<static>|Province whereRegionId($value)
 *
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 *
 * @method static ProvinceFactory factory($count = null, $state = [])
=======
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\ProvinceFactory factory($count = null, $state = [])
>>>>>>> 078f9da (.)
 *
 * @mixin \Eloquent
 */
class Province extends BaseModel
{
<<<<<<< HEAD
    use HasXotFactory;
=======
    use \Modules\Xot\Models\Traits\HasXotFactory;
>>>>>>> 078f9da (.)
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
