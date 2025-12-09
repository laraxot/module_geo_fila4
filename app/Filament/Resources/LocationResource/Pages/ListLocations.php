<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\LocationResource\Pages;

<<<<<<< HEAD
use Modules\Geo\Filament\Resources\LocationResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListLocations extends XotBaseListRecords
{
    protected static string $resource = LocationResource::class;

    protected static ?string $title = 'All Locations';
=======
use Filament\Resources\Pages\ListRecords;
use Modules\Geo\Filament\Resources\LocationResource;

class ListLocations extends ListRecords
{
    protected static string $resource = LocationResource::class;

    protected static null|string $title = 'All Locations';
>>>>>>> be08416 (.)

    protected function getHeaderWidgets(): array
    {
        return [
            //            LocationResource\Widgets\LocationMapWidget::class,
        ];
    }

    //    protected function getTableFiltersFormWidth(): string
    //    {
    //        return '4xl';
    //    }
}
