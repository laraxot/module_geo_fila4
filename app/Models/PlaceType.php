<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Modules\Xot\Models\Traits\HasXotFactory;

/**
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static Builder<static>|PlaceType newModelQuery()
 * @method static Builder<static>|PlaceType newQuery()
 * @method static Builder<static>|PlaceType query()
 *
=======
use Modules\Xot\Contracts\ProfileContract;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> b93ef594b4 (.)
>>>>>>> f0b4f5c (.)
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Builder<static>|PlaceType newModelQuery()
 * @method static Builder<static>|PlaceType newQuery()
 * @method static Builder<static>|PlaceType query()
<<<<<<< HEAD
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
=======
<<<<<<< HEAD
<<<<<<< HEAD
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
=======
 * @property-read \Modules\SaluteOra\Models\Profile|null $creator
 * @property-read \Modules\SaluteOra\Models\Profile|null $updater
>>>>>>> a12f125f4a (.)
=======
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlaceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlaceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlaceType query()
 * @property-read \Modules\SaluteOra\Models\Profile|null $creator
 * @property-read \Modules\SaluteOra\Models\Profile|null $updater
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
 * @mixin IdeHelperPlaceType
>>>>>>> be08416 (.)
 * @mixin \Eloquent
 */
class PlaceType extends BaseModel
{
<<<<<<< HEAD
    use HasXotFactory;

=======
>>>>>>> be08416 (.)
    protected $fillable = [
        'name',
        'description',
    ];

    // Definisci le relazioni e i metodi necessari per la classe PlaceType
}
