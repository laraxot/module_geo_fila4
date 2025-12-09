<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD

/**
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static Builder<static>|County newModelQuery()
 * @method static Builder<static>|County newQuery()
 * @method static Builder<static>|County query()
 *
 * @mixin \Eloquent
 */
/**
 * @property \Modules\Fixcity\Models\Profile|null $creator
 * @property \Modules\Fixcity\Models\Profile|null $updater
 *
 * @method static \Modules\Geo\Database\Factories\CountyFactory factory($count = null, $state = [])
 * @method static Builder<static>|County                        newModelQuery()
 * @method static Builder<static>|County                        newQuery()
 * @method static Builder<static>|County                        query()
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
 * @method static Builder|County newModelQuery()
 * @method static Builder|County newQuery()
 * @method static Builder|County query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|County newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|County newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|County query()
 * @property-read \Modules\SaluteOra\Models\Profile|null $creator
 * @property-read \Modules\SaluteOra\Models\Profile|null $updater
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
 * @mixin IdeHelperCounty
>>>>>>> be08416 (.)
 * @mixin \Eloquent
 */
class County extends BaseModel
{
    protected $fillable = [
        'state_id',
        'county',
        'state_index',
    ];
}
