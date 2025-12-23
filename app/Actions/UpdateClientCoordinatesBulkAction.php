<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\TechPlanner\Models\Client;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action to update coordinates for multiple clients based on their addresses.
 */
class UpdateClientCoordinatesBulkAction
{
    use QueueableAction;

    public function __construct(
        private readonly GetAddressDataFromFullAddressAction $getAddressDataFromFullAddressAction,
    ) {
    }

    /**
     * Execute the action to update coordinates for a collection of clients.
     *
     * @param Collection<int, Client> $clients
     *
     * @return array{success_count: int, error_messages: array<string>}
     */
    public function execute(Collection $clients): array
    {
        $successCount = 0;
        $errorMessages = [];

        DB::transaction(function () use ($clients, &$successCount, &$errorMessages) {
            foreach ($clients as $client) {
                $fullAddress = is_string($client->full_address) ? $client->full_address : '';
                $addressData = $this->getAddressDataFromFullAddressAction->execute($fullAddress);

                if (null !== $addressData && method_exists($addressData, 'toArray')) {
                    $toArray = $addressData->toArray();
                    if (is_array($toArray)) {
                        /** @var array<string, string|int|float|bool|null> $toArrayTyped */
                        $toArrayTyped = $toArray;
                        /** @var array<string, string|int|float|bool|null> $up */
                        $up = Arr::only($toArrayTyped, ['latitude', 'longitude']);
                        $client->update($up);
                        ++$successCount;
                    }
                } else {
                    $clientName = is_string($client->name) ? $client->name : 'Unknown';
                    $errors = $this->getAddressDataFromFullAddressAction->getErrors();
                    $errorMsgRaw = is_object($errors) && method_exists($errors, 'join') ? $errors->join(', ') : 'Errore sconosciuto';
                    $errorMsg = is_string($errorMsgRaw) ? $errorMsgRaw : 'Errore sconosciuto';
                    $errorMessages[] = "Errore per {$clientName}: {$errorMsg}";
                }
            }
        });

        return [
            'success_count' => $successCount,
            'error_messages' => $errorMessages,
        ];
    }
}
