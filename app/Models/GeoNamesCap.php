<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Geo\Models\GeoNamesCap.
 *
 * <<<<<<< HEAD
 * <<<<<<< HEAD
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
 * @method static Builder<static>|GeoNamesCap newModelQuery()
 * @method static Builder<static>|GeoNamesCap newQuery()
 * @method static Builder<static>|GeoNamesCap query()
 *
 * <<<<<<< HEAD
 * <<<<<<< HEAD
 * =======
 * >>>>>>> 0746367 (.)
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\GeoNamesCapFactory factory($count = null, $state = [])
 *
 * <<<<<<< HEAD
 * =======
 * >>>>>>> 1bb689f (.)
 * =======
 * >>>>>>> 0746367 (.)
 *
 * @mixin \Eloquent
 */
class GeoNamesCap extends BaseModel
{
    // use Searchable;

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
