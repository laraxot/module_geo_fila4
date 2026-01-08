<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Modules\Geo\Database\Factories\CountyFactory;
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> 078f9da (.)

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static Builder<static>|County newModelQuery()
 * @method static Builder<static>|County newQuery()
 * @method static Builder<static>|County query()
 *
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 *
 * @method static CountyFactory factory($count = null, $state = [])
=======
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\CountyFactory factory($count = null, $state = [])
>>>>>>> 078f9da (.)
 *
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
