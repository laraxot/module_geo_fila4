<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Widgets;

<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
=======
use Filament\Tables;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
>>>>>>> be08416 (.)
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Modules\Geo\Models\Location;

<<<<<<< HEAD
=======
/**
 * Widget tabella location migrato per Filament v4.
 * Funzionalità mappa temporaneamente rimosse in attesa di pacchetti compatibili.
 */
>>>>>>> be08416 (.)
class LocationMapTableWidget extends BaseWidget
{
    protected static ?string $heading = 'Location Map';

    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = null;

<<<<<<< HEAD
    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns($this->getTableColumns());
    }

=======
    protected static bool $collapsible = true;

    /**
     * @return Builder<Location>
     */
>>>>>>> be08416 (.)
    protected function getTableQuery(): Builder
    {
        return Location::query()->latest();
    }

<<<<<<< HEAD
=======
    /**
     * @return array<Tables\Columns\Column>
     */
>>>>>>> be08416 (.)
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable()
                ->sortable(),
<<<<<<< HEAD
=======
            TextColumn::make('street')
                ->searchable()
                ->sortable(),
>>>>>>> be08416 (.)
            TextColumn::make('city')
                ->searchable()
                ->sortable(),
            TextColumn::make('state')
                ->searchable()
                ->sortable(),
<<<<<<< HEAD
        ];
    }
=======
            TextColumn::make('zip')
                ->sortable(),
            TextColumn::make('latitude')
                ->numeric(decimalPlaces: 6)
                ->sortable(),
            TextColumn::make('longitude')
                ->numeric(decimalPlaces: 6)
                ->sortable(),
        ];
    }

    /**
     * Configurazione della tabella.
     */
    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns($this->getTableColumns());
    }
>>>>>>> be08416 (.)
}
