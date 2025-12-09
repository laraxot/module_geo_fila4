<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Photon;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> be08416 (.)
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Modules\Geo\Datas\AddressData;
use Modules\Geo\Datas\Photon\PhotonAddressData;
<<<<<<< HEAD

use function Safe\json_decode;

use Webmozart\Assert\Assert;

=======
use Webmozart\Assert\Assert;

use function Safe\json_decode;

>>>>>>> be08416 (.)
/**
 * Action per ottenere l'indirizzo e le coordinate tramite Photon.
 *
 * Questa classe utilizza l'API Photon per convertire
 * un indirizzo in coordinate geografiche e dettagli dell'indirizzo.
 */
readonly class GetAddressFromPhotonAction
{
    private const API_URL = 'https://photon.komoot.io/api';

    public function __construct(
<<<<<<< HEAD
        private Client $client,
    ) {
    }
=======
        private  Client $client,
    ) {}
>>>>>>> be08416 (.)

    /**
     * Ottiene i dettagli dell'indirizzo utilizzando Photon.
     */
<<<<<<< HEAD
    public function execute(string $address): ?AddressData
=======
    public function execute(string $address): null|AddressData
>>>>>>> be08416 (.)
    {
        $this->validateInput($address);

        try {
            $response = $this->makeApiRequest($address);
            /** @var array{features: array<array{properties: array<string, mixed>, geometry: array{coordinates: array<float>}}>} $data */
            $data = json_decode($response, true);

            if (empty($data['features'][0])) {
                return null;
            }

            $photonData = PhotonAddressData::fromPhotonFeature($data['features'][0]);

<<<<<<< HEAD
            $latitude = $photonData->coordinates['latitude'] ?? 0.0;
            $longitude = $photonData->coordinates['longitude'] ?? 0.0;

            return new AddressData(
                latitude: is_float($latitude) ? $latitude : (float) $latitude,
                longitude: is_float($longitude) ? $longitude : (float) $longitude,
=======
            return new AddressData(
                latitude: $photonData->coordinates['latitude'],
                longitude: $photonData->coordinates['longitude'],
>>>>>>> be08416 (.)
                country: $photonData->country,
                city: $photonData->city,
                postal_code: (int) ($photonData->postcode ?: 0),
                street: $photonData->street,
                street_number: $photonData->housenumber,
            );
<<<<<<< HEAD
        } catch (\Exception $e) {
=======
        } catch (Exception $e) {
>>>>>>> be08416 (.)
            Log::error('Exception during Photon API request', [
                'exception' => $e->getMessage(),
                'address' => $address,
            ]);

            return null;
        }
    }

    /**
     * Valida i dati di input.
     */
    private function validateInput(string $address): void
    {
        Assert::notEmpty($address, 'Address cannot be empty');
        Assert::maxLength($address, 200, 'Address is too long');
    }

    /**
     * Effettua la richiesta all'API di Photon.
     *
     * @throws GuzzleException Se la richiesta fallisce
     */
    private function makeApiRequest(string $address): string
    {
        $response = $this->client->get(self::API_URL, [
            'query' => [
                'q' => $address,
                'limit' => 1,
            ],
        ]);

        return $response->getBody()->getContents();
    }
}
