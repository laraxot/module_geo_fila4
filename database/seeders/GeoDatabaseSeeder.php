<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Seeders;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Database\Seeders\AddressSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\ComuneSeeder;
use Database\Seeders\ProvinceSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\PlaceSeeder;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class GeoDatabaseSeeder.
 */
class GeoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

<<<<<<< HEAD
        $this->call([]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->call([]);
=======
        $this->call([
            AddressSeeder::class,
            LocationSeeder::class,
            ComuneSeeder::class,
            ProvinceSeeder::class,
            RegionSeeder::class,
            PlaceSeeder::class,
        ]);
>>>>>>> a12f125f4a (.)
=======
        $this->call([]);
>>>>>>> b93ef594b4 (.)
=======
        $this->call([
            \Database\Seeders\AddressSeeder::class,
            \Database\Seeders\LocationSeeder::class,
            \Database\Seeders\ComuneSeeder::class,
            \Database\Seeders\ProvinceSeeder::class,
            \Database\Seeders\RegionSeeder::class,
            \Database\Seeders\PlaceSeeder::class,
        ]);
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    }
}
