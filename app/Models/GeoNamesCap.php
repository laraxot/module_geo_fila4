<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
use Modules\Xot\Contracts\ProfileContract;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Collection;
use Closure;
use Illuminate\Contracts\Database\Query\Expression;
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
 * @method static GeoNamesCap|null first()
 * @method static Collection<int, GeoNamesCap> get()
 * @method static GeoNamesCap create(array $attributes = [])
 * @method static GeoNamesCap firstOrCreate(array $attributes = [], array $values = [])
 * @method static Builder<static>|GeoNamesCap where((string|Closure) $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static Builder<static>|GeoNamesCap whereNotNull((string|Expression) $columns)
 * @method static int count(string $columns = '*')
 *
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
 * @mixin \Eloquent
 */
class GeoNamesCap extends Model
{
    // use Searchable;
    use Updater;
>>>>>>> be08416 (.)

    /** @var string */
    protected $table = 'geonames_cap';
<<<<<<< HEAD
<<<<<<< HEAD

    // protected $connection = 'geo';
=======
    // protected $connection = 'geo';

>>>>>>> bc26394 (.)
=======

    // protected $connection = 'geo';
>>>>>>> c942565 (.)
    /*
     * { function_description }
     *
     */
    /*
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
     * function __construct(){
     * $this->setConnection('user');
     * parent::__construct();
     * }//end construct
     */
<<<<<<< HEAD
=======
    function __construct(){
        $this->setConnection('user');
        parent::__construct();
    }//end construct
    */
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
}
