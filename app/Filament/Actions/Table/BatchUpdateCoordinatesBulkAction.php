<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Actions\Table;

use Filament\Actions\BulkAction;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection as SupportCollection;
use Modules\Geo\Actions\BatchUpdateCoordinatesAction;
use Modules\TechPlanner\Models\Client;

/**
 * BatchUpdateCoordinatesBulkAction
 *
 * Factory per una Filament bulk action che aggiorna le coordinate dei clienti selezionati.
 * Utilizza BatchUpdateCoordinatesAction con Spatie QueueableAction per elaborazione asincrona.
 */
class BatchUpdateCoordinatesBulkAction
{
    /**
     * Crea la BulkAction Filament per aggiornare le coordinate dei clienti selezionati.
     */
    public static function make(): BulkAction
    {
        return BulkAction::make('updateCoordinates')
            ->label('Aggiorna coordinate selezionate')
            ->icon('heroicon-o-map-pin')
            ->requiresConfirmation()
            ->modalHeading('Aggiorna coordinate selezionate')
            ->modalDescription('Metti in coda l\'aggiornamento delle coordinate per i clienti selezionati.')
            ->modalSubmitActionLabel('Avvia aggiornamento')
            ->action(function (EloquentCollection $records): void {
                /** @var SupportCollection<int, Client> $clients */
                $clients = collect($records->all());

                /** @var BatchUpdateCoordinatesAction $action */
                $action = app(BatchUpdateCoordinatesAction::class);
                $result = $action->onQueue()->execute($clients);

                Notification::make()
                    ->success()
                    ->title('Aggiornamento coordinate avviato')
                    ->body(
                        "Aggiornamento in coda per {$records->count()} clienti. " .
                        "Successi: {$result['success']}, Errori: {$result['errors']}"
                    )
                    ->send();
            })
            ->deselectRecordsAfterCompletion();
    }
}