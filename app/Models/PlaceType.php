<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Modules\Geo\Database\Factories\PlaceTypeFactory;
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> 078f9da (.)
use Modules\Xot\Models\Traits\HasXotFactory;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static Builder<static>|PlaceType newModelQuery()
 * @method static Builder<static>|PlaceType newQuery()
 * @method static Builder<static>|PlaceType query()
 *
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 *
 * @method static PlaceTypeFactory factory($count = null, $state = [])
=======
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\PlaceTypeFactory factory($count = null, $state = [])
>>>>>>> 078f9da (.)
 *
 * @mixin \Eloquent
 */
class PlaceType extends BaseModel
{
    use HasXotFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Definisci le relazioni e i metodi necessari per la classe PlaceType
}
