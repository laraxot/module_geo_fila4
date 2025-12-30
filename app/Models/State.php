<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Modules\Xot\Contracts\ProfileContract;
use Modules\Geo\Database\Factories\StateFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Geo\Database\Factories\StateFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static Builder<static>|State newModelQuery()
 * @method static Builder<static>|State newQuery()
 * @method static Builder<static>|State query()
 *
 * @property ProfileContract|null $deleter
 *
 * @method static StateFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class State extends BaseModel
{
    protected $fillable = [
        'state',
        'state_code',
    ];
}
