<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;

/**
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static Builder<static>|State newModelQuery()
 * @method static Builder<static>|State newQuery()
 * @method static Builder<static>|State query()
 *
=======
use Modules\Geo\Database\Factories\StateFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Builder|State newModelQuery()
 * @method static Builder|State newQuery()
 * @method static Builder|State query()
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @mixin IdeHelperState
>>>>>>> be08416 (.)
 * @mixin \Eloquent
 */
class State extends BaseModel
{
<<<<<<< HEAD
=======
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return StateFactory
     */
    protected static function newFactory(): StateFactory
    {
        return StateFactory::new();
    }

>>>>>>> be08416 (.)
    protected $fillable = [
        'state',
        'state_code',
    ];
}
