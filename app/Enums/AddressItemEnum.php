<?php

declare(strict_types=1);

namespace Modules\Geo\Enums;

use Filament\Forms\Components\TextInput;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Arr;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Enum per i driver SMS supportati.
 *
 * Questo enum centralizza la gestione dei driver SMS disponibili
 * e fornisce metodi helper per ottenere le opzioni e le etichette.
 */
enum AddressItemEnum: string implements HasLabel, HasIcon, HasColor
{
    use TransTrait;

    case PHONE = 'phone';
    case NAME = 'name';
    case DESCRIPTION = 'description';
    case ROUTE = 'route';
    case STREET_NUMBER = 'street_number';
    case LOCALITY = 'locality';
    case ADMINISTRATIVE_AREA_LEVEL_3 = 'administrative_area_level_3'; // comune
    case ADMINISTRATIVE_AREA_LEVEL_2 = 'administrative_area_level_2'; // provincia
    case ADMINISTRATIVE_AREA_LEVEL_1 = 'administrative_area_level_1'; // regione
    case COUNTRY = 'country'; // Stato/Paese
    case POSTAL_CODE = 'postal_code';
    case FORMATTED_ADDRESS = 'formatted_address';
    case PLACE_ID = 'place_id';
    case LATITUDE = 'latitude';
    case LONGITUDE = 'longitude';

    public function getLabel(): string
    {
        return $this->transClass(self::class, $this->value.'.label');
    }

    public function getColor(): string
    {
        return $this->transClass(self::class, $this->value.'.color');
    }

    public function getIcon(): string
    {
        return $this->transClass(self::class, $this->value.'.icon');
    }

    public function getDescription(): string
    {
        return $this->transClass(self::class, $this->value.'.description');
    }

    public static function getSearchable(): array
    {
        return array_map(fn ($item) => $item->value, self::cases());
    }

    public static function getFormSchema(): array
    {
        $res = Arr::map(
            self::cases(),
            fn ($item) => TextInput::make($item->value)->prefixIcon($item->getIcon()),
        );

        return $res;
    }
}
