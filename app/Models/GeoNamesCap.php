<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Modules\Geo\Database\Factories\GeoNamesCapFactory;
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> 078f9da (.)

/**
 * Modules\Geo\Models\GeoNamesCap.
 *
<<<<<<< HEAD
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
=======
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> 078f9da (.)
 *
 * @method static Builder<static>|GeoNamesCap newModelQuery()
 * @method static Builder<static>|GeoNamesCap newQuery()
 * @method static Builder<static>|GeoNamesCap query()
 *
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 *
 * @method static GeoNamesCapFactory factory($count = null, $state = [])
=======
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\GeoNamesCapFactory factory($count = null, $state = [])
>>>>>>> 078f9da (.)
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
