<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\Pages;

use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
=======
use Filament\Tables;
>>>>>>> be08416 (.)
use Modules\Geo\Filament\Resources\LocationResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListLocations extends XotBaseListRecords
{
    protected static string $resource = LocationResource::class;

    /**
     * @return array<string, mixed>
     */
    public function getTableComumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable(),
            'street' => TextColumn::make('street'),
            'city' => TextColumn::make('city')->searchable(),
            'state' => TextColumn::make('state')->searchable(),
            'zip' => TextColumn::make('zip'),
        ];
    }
}
