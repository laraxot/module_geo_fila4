<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Model;
// //use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;
>>>>>>> be08416 (.)

/**
 * Modules\Geo\Models\GeoNamesCap.
 *
<<<<<<< HEAD
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static Builder<static>|GeoNamesCap newModelQuery()
 * @method static Builder<static>|GeoNamesCap newQuery()
 * @method static Builder<static>|GeoNamesCap query()
 *
 * @mixin \Eloquent
 */
class GeoNamesCap extends BaseModel
{
    // use Searchable;
=======
 * @method static Builder|GeoNamesCap newModelQuery()
 * @method static Builder|GeoNamesCap newQuery()
 * @method static Builder|GeoNamesCap query()
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @mixin \Eloquent
 */
class GeoNamesCap extends Model
{
    // use Searchable;
    use Updater;
>>>>>>> be08416 (.)

    /** @var string */
    protected $table = 'geonames_cap';

    // protected $connection = 'geo';
    /*
     * { function_description }
     *
     */
    /*
     * function __construct(){
     * $this->setConnection('user');
     * parent::__construct();
     * }//end construct
     */
}
