<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Actions\Header;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Modules\Geo\Actions\BatchUpdateCoordinatesAction;
use Modules\TechPlanner\Models\Client;

/**
 * BatchUpdateCoordinatesHeaderAction
 *
 * Filament header action per aggiornare le coordinate di tutti i clienti senza coordinate
 * Utilizza BatchUpdateCoordinatesAction con Spatie QueueableAction per elaborazione asincrona
 */
class BatchUpdateCoordinatesHeaderAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('Aggiorna coordinate mancanti')
            ->icon('heroicon-o-map-pin')
            ->requiresConfirmation()
            ->modalHeading('Aggiorna coordinate mancanti')
            ->modalDescription('Metti in coda l\'aggiornamento delle coordinate per tutti i clienti senza latitudine/longitudine.')
            ->modalSubmitActionLabel('Avvia aggiornamento')
            ->action(function (): void {
                // Trova i clienti senza coordinate
                $clients = Client::whereNull('latitude')
                    ->orWhereNull('longitude')
                    ->get();

                if ($clients->isEmpty()) {
                    Notification::make()
                        ->info()
                        ->title('Nessun cliente da aggiornare')
                        ->body('Tutti i clienti hanno già le coordinate impostate.')
                        ->send();
                    return;
                }

                // Esegui l'aggiornamento in batch tramite QueueableAction
                /** @var BatchUpdateCoordinatesAction $action */
                $action = app(BatchUpdateCoordinatesAction::class);
                $result = $action->onQueue()->execute($clients);

                Notification::make()
                    ->success()
                    ->title('Aggiornamento coordinate avviato')
                    ->body("Aggiornamento in coda per {$clients->count()} clienti. Successi: {$result['success']}, Errori: {$result['errors']}")
                    ->send();
            });
    }
}