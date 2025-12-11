<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Seeders;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Database\Seeders\AddressSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\ComuneSeeder;
use Database\Seeders\ProvinceSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\PlaceSeeder;
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
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
>>>>>>> bc26394 (.)
=======
        $this->call([]);
>>>>>>> c942565 (.)
    }
}
