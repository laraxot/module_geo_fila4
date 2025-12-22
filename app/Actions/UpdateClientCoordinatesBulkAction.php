<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use Modules\Geo\Actions\GetAddressDataFromFullAddressAction;
=======
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
use Modules\TechPlanner\Models\Client;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action to update coordinates for multiple clients based on their addresses.
 */
class UpdateClientCoordinatesBulkAction
{
    use QueueableAction;

    public function __construct(
<<<<<<< HEAD
        private readonly GetAddressDataFromFullAddressAction $getAddressDataFromFullAddressAction
=======
        private readonly GetAddressDataFromFullAddressAction $getAddressDataFromFullAddressAction,
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
    ) {
    }

    /**
     * Execute the action to update coordinates for a collection of clients.
     *
     * @param Collection<int, Client> $clients
<<<<<<< HEAD
=======
     *
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
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

<<<<<<< HEAD
                if ($addressData !== null && method_exists($addressData, 'toArray')) {
=======
                if (null !== $addressData && method_exists($addressData, 'toArray')) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
                    $toArray = $addressData->toArray();
                    if (is_array($toArray)) {
                        /** @var array<string, string|int|float|bool|null> $toArrayTyped */
                        $toArrayTyped = $toArray;
                        /** @var array<string, string|int|float|bool|null> $up */
                        $up = Arr::only($toArrayTyped, ['latitude', 'longitude']);
                        $client->update($up);
<<<<<<< HEAD
                        $successCount++;
=======
                        ++$successCount;
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
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
<<<<<<< HEAD
}
=======
}
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
