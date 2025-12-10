<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use DB;
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Expression;

trait GeographicalScopes
{
    /**
     * Scope per calcolare la distanza tra due punti.
     */
    public function scopeWithDistance(Builder $query, float $latitude, float $longitude): Builder
    {
        return $query->select('*', $this->getDistanceExpression($latitude, $longitude, 'distance'));
    }

    /**
     * Scope per ordinare i risultati per distanza.
     */
    public function scopeOrderByDistance(Builder $query, float $latitude, float $longitude): Builder
    {
        return $query->orderBy($this->getDistanceExpression($latitude, $longitude));
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
    public function getDistanceExpression(
        float $latitude,
        float $longitude,
<<<<<<< HEAD
        ?string $alias = null,
=======
        null|string $alias = null,
>>>>>>> be08416 (.)
    ): Expression|\Illuminate\Contracts\Database\Query\Expression {
        $sql = "
            (6371 * acos(
                cos(radians({$latitude})) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians({$longitude})) +
                sin(radians({$latitude})) *
<<<<<<< HEAD
=======
    public function getDistanceExpression(float $latitude, float $longitude, ?string $alias = null): Expression
    {
        $sql = "
            (6371 * acos(
                cos(radians($latitude)) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians($longitude)) +
                sin(radians($latitude)) *
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
                sin(radians(latitude))
            ))
        ";
        if (null !== $alias) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
            $sql .= " AS {$alias}";
        }

        return new Expression($sql);

<<<<<<< HEAD
=======
            $sql .= " AS $alias";
        }

        return DB::raw($sql);
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
        // AS distance
    }
}
