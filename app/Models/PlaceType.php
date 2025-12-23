<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Models\Traits\HasXotFactory;

/**
 * <<<<<<< HEAD
 * <<<<<<< HEAD.
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *                                                                =======
 * @property \Modules\Quaeris\Models\Profile|null        $creator
 * @property \Modules\Quaeris\Models\Profile|null        $updater
 *                                                                >>>>>>> 1bb689f (.)
 *                                                                =======
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *                                                                >>>>>>> 0746367 (.)
 *
 * @method static Builder<static>|PlaceType newModelQuery()
 * @method static Builder<static>|PlaceType newQuery()
 * @method static Builder<static>|PlaceType query()
 *
 * <<<<<<< HEAD
 * <<<<<<< HEAD
 * =======
 * >>>>>>> 0746367 (.)
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\PlaceTypeFactory factory($count = null, $state = [])
 *
 * <<<<<<< HEAD
 * =======
 * >>>>>>> 1bb689f (.)
 * =======
 * >>>>>>> 0746367 (.)
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
