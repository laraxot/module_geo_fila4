<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Exception;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;
use Modules\Geo\Actions\BingMaps\GetAddressFromBingMapsAction;
use Modules\Geo\Actions\GoogleMaps\GetAddressFromGoogleMapsAction;
use Modules\Geo\Actions\Here\GetAddressFromHereMapsAction;
use Modules\Geo\Actions\Mapbox\GetAddressFromMapboxAction;
use Modules\Geo\Actions\Nominatim\GetAddressFromNominatimAction;
use Modules\Geo\Actions\OpenCage\GetAddressFromOpenCageAction;
use Modules\Geo\Actions\Photon\GetAddressFromPhotonAction;
use Modules\Geo\Datas\AddressData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use RuntimeException;
use Webmozart\Assert\Assert;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

/**
 * Classe per ottenere i dati dell'indirizzo utilizzando diversi servizi di geocoding.
 */
class GetAddressDataFromFullAddressAction
{
    public Collection $errors;

    /**
     * Ottiene i dati dell'indirizzo da un indirizzo completo.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string $fullAddress L'indirizzo da cercare
     *
     * @throws \RuntimeException Se la richiesta fallisce o l'indirizzo non viene trovato
     *
     * @return AddressData I dati dell'indirizzo trovato
=======
     * @param  string  $fullAddress  L'indirizzo da cercare
     * @return AddressData I dati dell'indirizzo trovato
     *
     * @throws RuntimeException Se la richiesta fallisce o l'indirizzo non viene trovato
>>>>>>> 1bb689f (.)
=======
     * @param string $fullAddress L'indirizzo da cercare
     *
     * @throws \RuntimeException Se la richiesta fallisce o l'indirizzo non viene trovato
     *
     * @return AddressData I dati dell'indirizzo trovato
>>>>>>> 0746367 (.)
     */
    public function execute(string $fullAddress): ?AddressData
    {
        $this->errors = collect();
        $services = [
            GetAddressFromGoogleMapsAction::class,
            GetAddressFromPhotonAction::class,
            GetAddressFromNominatimAction::class,
            GetAddressFromBingMapsAction::class,
            GetAddressFromHereMapsAction::class,
            GetAddressFromMapboxAction::class,
            // GetAddressFromMapTilerAction::class,
            GetAddressFromOpenCageAction::class,
            // GetAddressFromOpenStreetMapAction::class,
            // GetAddressFromPeliasAction::class,
            // GetAddressFromTomTomAction::class,
        ];

        foreach ($services as $service) {
            // PHPStan knows these classes exist since they're hardcoded
<<<<<<< HEAD
<<<<<<< HEAD
            if (! class_exists($service)) {
                continue; // Skip if class doesn't exist
            }
=======
            /** @phpstan-ignore staticMethod.alreadyNarrowedType */
            Assert::classExists($service);
>>>>>>> 1bb689f (.)
=======
            if (! class_exists($service)) {
                continue; // Skip if class doesn't exist
            }
>>>>>>> 0746367 (.)
            try {
                $result = app($service)->execute($fullAddress);
                if ($result instanceof AddressData) {
                    return $result;
                }
<<<<<<< HEAD
<<<<<<< HEAD
            } catch (\Exception $e) {
=======
            } catch (Exception $e) {
>>>>>>> 1bb689f (.)
=======
            } catch (\Exception $e) {
>>>>>>> 0746367 (.)
                // Logga l'errore o gestiscilo in altro modo
                $this->errors->push($e->getMessage());
            }
        }
        $message = 'Nessun servizio di geocoding ha restituito un risultato valido.';
        // throw new \RuntimeException('Nessun servizio di geocoding ha restituito un risultato valido.');
        Notification::make()
            ->title('Error')
            ->body($message)
            ->danger()
            ->persistent();

        return null;
    }

    public function getErrors(): Collection
    {
        return $this->errors;
    }
}
