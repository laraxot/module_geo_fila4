<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Fields;

<<<<<<< HEAD
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
=======
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
>>>>>>> be08416 (.)

class AddressField extends Section
{
    // protected string $optionValueProperty = 'id';

    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
        $this// ->description('The items you have selected for purchase')
<<<<<<< HEAD
            ->icon('heroicon-o-map-pin')
=======
        ->icon('heroicon-o-map-pin')
>>>>>>> be08416 (.)
            // ->label(__('geo::place.fields.address'))
            ->relationship('place')
            ->schema([
                TextInput::make('route')->label(__('geo::place.fields.route')), // via
                TextInput::make('street_number')->label(__('geo::place.fields.street_number')), // civico
                TextInput::make('postal_code')->label(__('geo::place.fields.postal_code')), // 20124
                TextInput::make('locality')->label(__('geo::place.fields.locality')), // citta
                TextInput::make('administrative_area_level_2')->label(__(
                    'geo::place.fields.administrative_area_level_2',
                )), // provincia
                // TextInput::make('administrative_area_level_1')->label(__('geo::place.fields.administrative_area_level_1')), //regione
                TextInput::make('country')->label(__('geo::place.fields.country')), // italia
            ])
            ->columns(2);
=======
        $this
            // ->description('The items you have selected for purchase')
            ->icon('heroicon-o-map-pin')
            // ->label(__('geo::place.fields.address'))
            ->relationship('place')
            ->schema(
                [
                    TextInput::make('route')->label(__('geo::place.fields.route')), // via
                    TextInput::make('street_number')->label(__('geo::place.fields.street_number')), // civico
                    TextInput::make('postal_code')->label(__('geo::place.fields.postal_code')), // 20124
                    TextInput::make('locality')->label(__('geo::place.fields.locality')), // citta
                    TextInput::make('administrative_area_level_2')->label(__('geo::place.fields.administrative_area_level_2')), // provincia
                    // TextInput::make('administrative_area_level_1')->label(__('geo::place.fields.administrative_area_level_1')), //regione
                    TextInput::make('country')->label(__('geo::place.fields.country')), // italia
                ]
            )->columns(2);
>>>>>>> bc26394 (.)
    }
}
