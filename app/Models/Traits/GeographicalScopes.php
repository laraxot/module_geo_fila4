<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use DB;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> f0b4f5c (.)
    public function getDistanceExpression(
        float $latitude,
        float $longitude,
<<<<<<< HEAD
        ?string $alias = null,
=======
        null|string $alias = null,
>>>>>>> be08416 (.)
    ): Expression|\Illuminate\Contracts\Database\Query\Expression {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
        $sql = "
            (6371 * acos(
                cos(radians({$latitude})) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians({$longitude})) +
                sin(radians({$latitude})) *
<<<<<<< HEAD
=======
=======
    public function getDistanceExpression(float $latitude, float $longitude, ?string $alias = null): Expression
    {
=======
>>>>>>> b93ef594b4 (.)
        $sql = "
            (6371 * acos(
                cos(radians({$latitude})) *
                cos(radians(latitude)) *
<<<<<<< HEAD
                cos(radians(longitude) - radians($longitude)) +
                sin(radians($latitude)) *
>>>>>>> a12f125f4a (.)
=======
                cos(radians(longitude) - radians({$longitude})) +
                sin(radians({$latitude})) *
>>>>>>> b93ef594b4 (.)
=======
    public function getDistanceExpression(float $latitude, float $longitude, ?string $alias = null): Expression
    {
        $sql = "
            (6371 * acos(
                cos(radians($latitude)) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians($longitude)) +
                sin(radians($latitude)) *
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
                sin(radians(latitude))
            ))
        ";
        if (null !== $alias) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
            $sql .= " AS {$alias}";
        }

        return new Expression($sql);

<<<<<<< HEAD
=======
=======
            $sql .= " AS $alias";
        }

        return DB::raw($sql);
>>>>>>> a12f125f4a (.)
=======
            $sql .= " AS {$alias}";
        }

        return new Expression($sql);

>>>>>>> b93ef594b4 (.)
=======
            $sql .= " AS $alias";
        }

        return \DB::raw($sql);
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
        // AS distance
    }
}
