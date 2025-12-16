<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

// use GeneaLabs\LaravelModelCaching\Traits\Cachable;
// //use Laravel\Scout\Searchable;
use Modules\Xot\Models\XotBaseModel;

/**
 * Class BaseModel.
 *
 */
abstract class BaseModel extends XotBaseModel
{
    protected $connection = 'geo';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];
<<<<<<< HEAD
=======
=======
abstract class BaseModel extends Model
{
    use \Modules\Xot\Models\Traits\HasXotFactory;
    use Updater;

    /**
     * The factory class for this model.
     *
     * @var class-string<Factory>
     */
    protected static $factory = null;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    // use Searchable;
    // use Cachable;

    /** @var list<string> */
    protected $fillable = ['id'];
>>>>>>> be08416 (.)
>>>>>>> 30b582c (.)

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'published_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ]);
    }
}
