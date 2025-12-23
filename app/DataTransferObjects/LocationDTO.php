<?php

declare(strict_types=1);

namespace Modules\Geo\DataTransferObjects;

use Modules\Geo\Datas\LocationData;

/**
 * Data Transfer Object per le posizioni geografiche.
 */
readonly class LocationDTO
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param float       $latitude  Latitudine in gradi decimali
     * @param float       $longitude Longitudine in gradi decimali
     * @param string|null $name      Nome opzionale della posizione
=======
     * @param  float  $latitude  Latitudine in gradi decimali
     * @param  float  $longitude  Longitudine in gradi decimali
     * @param  string|null  $name  Nome opzionale della posizione
>>>>>>> 1bb689f (.)
=======
     * @param float       $latitude  Latitudine in gradi decimali
     * @param float       $longitude Longitudine in gradi decimali
     * @param string|null $name      Nome opzionale della posizione
>>>>>>> 0746367 (.)
     */
    public function __construct(
        public float $latitude,
        public float $longitude,
        public ?string $name = null,
<<<<<<< HEAD
<<<<<<< HEAD
    ) {
    }
=======
    ) {}
>>>>>>> 1bb689f (.)
=======
    ) {
    }
>>>>>>> 0746367 (.)

    /**
     * Crea una nuova istanza da un oggetto LocationData.
     */
    public static function fromLocationData(LocationData $data): self
    {
        return new self(
            latitude: $data->latitude,
            longitude: $data->longitude,
            name: $data->name,
        );
    }

    /**
     * Converte l'oggetto in un'istanza di LocationData.
     */
    public function toLocationData(): LocationData
    {
        return new LocationData(
            latitude: $this->latitude,
            longitude: $this->longitude,
            name: $this->name,
        );
    }
}
