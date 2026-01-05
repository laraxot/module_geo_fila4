<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Geo\Database\Factories\StateFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * @method static Builder|State newModelQuery()
 * @method static Builder|State newQuery()
 * @method static Builder|State query()
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @mixin IdeHelperState
 * @mixin \Eloquent
 */
class State extends BaseModel
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): StateFactory
    {
        return StateFactory::new();
    }

    protected $fillable = [
        'state',
        'state_code',
    ];
}
