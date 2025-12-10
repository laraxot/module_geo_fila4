<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Illuminate\Support\Collection;
use Modules\Geo\Actions\GetAddressDataFromFullAddressAction;
use Modules\TechPlanner\Models\Client;
use Spatie\QueueableAction\QueueableAction;
use Throwable;

/**
 * BatchUpdateCoordinatesAction
 *
 * Azione per aggiornare le coordinate di clienti in batch utilizzando Spatie QueueableAction
 * Gestisce l'aggiornamento asincrono delle coordinate con gestione errori
 */
class BatchUpdateCoordinatesAction
{
    use QueueableAction;

    public function __construct(
        private readonly GetAddressDataFromFullAddressAction $getAddressDataAction
    ) {}

    /**
     * Esegue l'aggiornamento delle coordinate per una collezione di clienti.
     *
     * @param Collection<int, Client> $clients
     *
     * @return array{success: int, errors: int, error_messages: list<string>}
     */
    public function execute(Collection $clients): array
    {
        $successCount = 0;
        $errorCount = 0;
        /** @var list<string> $errorMessages */
        $errorMessages = [];

        foreach ($clients as $client) {
            try {
                if (!$client->full_address) {
                    $errorMessages[] = "Cliente {$client->id}: indirizzo vuoto";
                    $errorCount++;
                    continue;
                }

                $addressData = $this->getAddressDataAction->execute($client->full_address);

                if ($addressData !== null) {
                    $addressArray = $addressData->toArray();

                    // Aggiorna solo latitudine e longitudine
                    $client->update([
                        'latitude' => $addressArray['latitude'] ?? null,
                        'longitude' => $addressArray['longitude'] ?? null,
                    ]);

                    $successCount++;
                } else {
                    $errorMessages[] = "Cliente {$client->id}: impossibile ottenere coordinate dall'indirizzo";
                    $errorCount++;
                }
            } catch (Throwable $e) {
                $errorMessages[] = "Cliente {$client->id}: {$e->getMessage()}";
                $errorCount++;
            }
        }

        return [
            'success' => $successCount,
            'errors' => $errorCount,
            'error_messages' => $errorMessages,
        ];
    }
}