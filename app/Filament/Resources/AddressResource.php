<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
=======
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\Toggle;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Geo\Filament\Resources\AddressResource\Pages;
use Modules\Geo\Filament\Resources\AddressResource\RelationManagers;
>>>>>>> be08416 (.)
use Modules\Geo\Models\Address;
use Modules\Geo\Models\Locality;
use Modules\Geo\Models\Province;
use Modules\Geo\Models\Region;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Resource per la gestione degli indirizzi geografici.
 *
 * Fornisce un'interfaccia completa per:
 * - Creazione di nuovi indirizzi con validazione geografica
 * - Modifica dei dati esistenti
 * - Visualizzazione delle informazioni su mappa
 * - Gestione delle relazioni con altri modelli
 * fornendo funzionalità per la creazione, modifica e visualizzazione
 * degli indirizzi su mappa.
 */
class AddressResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = Address::class;

    // ✅ CORRETTO - NIENTE navigationGroup - La gestione è centralizzata in XotBaseResource

    protected static ?int $navigationSort = 3;
=======
    protected static null|string $model = Address::class;

    // ✅ CORRETTO - NIENTE navigationGroup - La gestione è centralizzata in XotBaseResource

    protected static null|int $navigationSort = 3;
>>>>>>> be08416 (.)

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> be08416 (.)
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->maxLength(255),
<<<<<<< HEAD
            'country' => TextInput::make('country') // Nazione
=======
            'country' => TextInput::make('country') //Nazione
>>>>>>> be08416 (.)
                ->maxLength(255)
                ->default('Italia')
                ->visible(false)
                ->columnSpan(2),
            'administrative_area_level_1' => Select::make('administrative_area_level_1')
                ->options(Region::getOptions(...))
                ->searchable()
                ->required()
                ->live()
<<<<<<< HEAD
                ->afterStateUpdated(function (Set $set): void {
=======
                ->afterStateUpdated(function (Set $set) {
>>>>>>> be08416 (.)
                    $set('administrative_area_level_2', null);
                    $set('locality', null);
                    $set('postal_code', null);
                    $set('cap', null);
                }),
            'administrative_area_level_2' => Select::make('administrative_area_level_2')
                ->options(Province::getOptions(...))
                ->searchable()
                ->required()
                ->live()
<<<<<<< HEAD
                ->afterStateUpdated(function (Set $set): void {
=======
                ->afterStateUpdated(function (Set $set) {
>>>>>>> be08416 (.)
                    $set('cap', null);
                    $set('postal_code', null);
                    $set('locality', null);
                })
<<<<<<< HEAD
                ->disabled(fn (Get $get) => ! $get('administrative_area_level_1'))
=======
                ->disabled(fn(Get $get) => !$get('administrative_area_level_1'))
>>>>>>> be08416 (.)
                ->placeholder(__('filament-forms::components.select.placeholder')),
            'locality' => Select::make('locality')
                ->options(Locality::getOptions(...))
                ->searchable()
                ->required()
                ->live()
<<<<<<< HEAD
                ->disabled(fn (Get $get) => ! $get('administrative_area_level_1') || ! $get('administrative_area_level_2'))
                ->extraAttributes(['class' => 'h-8 flex items-center'])
                ->afterStateUpdated(function (Set $set): void {
=======
                ->disabled(fn(Get $get) => !$get('administrative_area_level_1') || !$get('administrative_area_level_2'))
                ->extraAttributes(['class' => 'h-8 flex items-center'])
                ->afterStateUpdated(function (Set $set) {
>>>>>>> be08416 (.)
                    $set('postal_code', null);
                })
                ->placeholder(__('filament-forms::components.select.placeholder')),
            'postal_code' => Select::make('postal_code')
                ->options(Locality::getPostalCodeOptions(...))
                ->searchable()
                ->required()
                ->live()
<<<<<<< HEAD
                ->disabled(fn (Get $get) => ! $get('administrative_area_level_1') || ! $get('administrative_area_level_2'))
=======
                ->disabled(fn(Get $get) => !$get('administrative_area_level_1') || !$get('administrative_area_level_2'))
>>>>>>> be08416 (.)
                ->placeholder(__('filament-forms::components.select.placeholder')),
            'route' => TextInput::make('route')->required()->maxLength(255),
            'street_number' => TextInput::make('street_number')->maxLength(20),
            'is_primary' => Toggle::make('is_primary')->default(false),
        ];
    }

    public static function getSearchStep(): array
    {
        return [
            'region' => Select::make('region')
                ->options(Region::getOptions(...))
                ->searchable()
                ->required()
                ->live()
<<<<<<< HEAD
                ->afterStateUpdated(function (Set $set): void {
=======
                ->afterStateUpdated(function (Set $set) {
>>>>>>> be08416 (.)
                    $set('province', null);
                    $set('locality', null);
                    $set('postal_code', null);
                    $set('cap', null);
                }),
            'province' => Select::make('province')
                ->options(Province::getOptions(...))
                ->searchable()
                ->required()
                ->live()
<<<<<<< HEAD
                ->afterStateUpdated(function (Set $set): void {
=======
                ->afterStateUpdated(function (Set $set) {
>>>>>>> be08416 (.)
                    $set('cap', null);
                    $set('postal_code', null);
                    $set('locality', null);
                })
<<<<<<< HEAD
                ->disabled(fn (Get $get) => ! $get('region'))
                ->placeholder(__('filament-forms::components.select.placeholder')),
            // ->extraAttributes([
            // 'class' => 'h-9'
            // ])
=======
                ->disabled(fn(Get $get) => !$get('region'))
                ->placeholder(__('filament-forms::components.select.placeholder')),
            //->extraAttributes([
            //'class' => 'h-9'
            //])
>>>>>>> be08416 (.)
            'locality' => Select::make('locality')
                ->options(Locality::getOptions(...))
                ->searchable()
                ->required()
                ->live()
<<<<<<< HEAD
                ->disabled(fn (Get $get) => ! $get('region') || ! $get('province'))
                ->placeholder(__('filament-forms::components.select.placeholder'))
                ->afterStateUpdated(function (Set $set): void {
=======
                ->disabled(fn(Get $get) => !$get('region') || !$get('province'))
                ->placeholder(__('filament-forms::components.select.placeholder'))
                ->afterStateUpdated(function (Set $set) {
>>>>>>> be08416 (.)
                    $set('postal_code', null);
                }),
            'postal_code' => Select::make('postal_code')
                ->options(Locality::getPostalCodeOptions(...))
                ->searchable()
                ->required()
                ->live()
<<<<<<< HEAD
                ->disabled(fn (Get $get) => ! $get('region') || ! $get('province'))
=======
                ->disabled(fn(Get $get) => !$get('region') || !$get('province'))
>>>>>>> be08416 (.)
                ->placeholder(__('filament-forms::components.select.placeholder')),
        ];
    }
}
