<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

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

/**
 * @method static Builder|County newModelQuery()
 * @method static Builder|County newQuery()
 * @method static Builder|County query()
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 *
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
