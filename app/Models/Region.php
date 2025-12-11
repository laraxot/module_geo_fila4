<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

<<<<<<< HEAD
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Geo\Database\Factories\RegionFactory;
use Sushi\Sushi;

/**
 * @property int                                         $id
 * @property string|null                                 $name
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property Collection<int, Province>                   $provinces
 * @property int|null                                    $provinces_count
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static \Modules\Geo\Database\Factories\RegionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Region                        newModelQuery()
 * @method static Builder<static>|Region                        newQuery()
 * @method static Builder<static>|Region                        query()
 * @method static Builder<static>|Region                        whereId($value)
 * @method static Builder<static>|Region                        whereName($value)
 *
=======
use Sushi\Sushi;
use Modules\Geo\Database\Factories\RegionFactory;
use Filament\Schemas\Components\Utilities\Get;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> bc26394 (.)
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> c942565 (.)
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string|null $name
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
 * @property-read ProfileContract|null $creator
 * @property-read Collection<int, Province> $provinces
 * @property-read int|null $provinces_count
 * @property-read ProfileContract|null $updater
<<<<<<< HEAD
=======
 * @property-read \Modules\SaluteOra\Models\Profile|null $creator
 * @property-read Collection<int, Province> $provinces
 * @property-read int|null $provinces_count
 * @property-read \Modules\SaluteOra\Models\Profile|null $updater
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
 * @method static Builder<static>|Region newModelQuery()
 * @method static Builder<static>|Region newQuery()
 * @method static Builder<static>|Region query()
 * @method static Builder<static>|Region whereId($value)
 * @method static Builder<static>|Region whereName($value)
 * @mixin IdeHelperRegion
>>>>>>> be08416 (.)
 * @mixin \Eloquent
 */
class Region extends BaseModel
{
<<<<<<< HEAD
    use \Modules\Xot\Models\Traits\HasXotFactory;
=======
    use HasFactory;
>>>>>>> be08416 (.)
    use Sushi;

    /**
     * The factory class for this model.
     *
     * @var class-string<Factory>
     */
    protected static $factory = RegionFactory::class;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
    protected array $schema = [
        'id' => 'integer',
        'name' => 'string',
    ];

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
    public function getRows(): array
    {
        $rows = Comune::select('regione->codice as id', 'regione->nome as name')
            ->distinct()
            ->orderBy('regione->nome')
            ->get();

<<<<<<< HEAD
=======
    public function getRows(): array{
        $rows=Comune::select("regione->codice as id","regione->nome as name")
            ->distinct()
            ->orderBy("regione->nome")
            ->get();
       
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
        return $rows->toArray();
    }

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }

    public static function getOptions(Get $get): array
    {
        return self::orderBy('name')
            ->get()
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
            ->pluck('name', 'id')
            ->toArray();
    }
}
<<<<<<< HEAD
=======
            ->pluck("name", "id")
            ->toArray();
    }
}
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
