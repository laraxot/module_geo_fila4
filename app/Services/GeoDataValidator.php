<?php

declare(strict_types=1);

namespace Modules\Geo\Services;

use Illuminate\Support\Facades\Validator;

/**
 * Validatore per i dati geografici.
 *
 * Questo servizio fornisce metodi per validare la struttura e l'integrità
 * dei dati geografici nel file JSON.
 *
 * @see \Modules\Geo\docs\json-database.md
 */
class GeoDataValidator
{
    /**
     * Regole di validazione per i dati geografici.
     */
    private const VALIDATION_RULES = [
        'regions' => 'required|array',
        'regions.*.name' => 'required|string',
        'regions.*.code' => 'required|string|size:2',
        'regions.*.provinces' => 'required|array',
        'regions.*.provinces.*.name' => 'required|string',
        'regions.*.provinces.*.code' => 'required|string|size:2',
        'regions.*.provinces.*.cities' => 'required|array',
        'regions.*.provinces.*.cities.*.name' => 'required|string',
        'regions.*.provinces.*.cities.*.code' => 'required|string',
        'regions.*.provinces.*.cities.*.cap' => 'required|string|size:5',
    ];

    /**
     * Messaggi di errore personalizzati.
     */
    private const CUSTOM_MESSAGES = [
        'regions.required' => 'Il file JSON deve contenere un array di regioni',
        'regions.array' => 'Le regioni devono essere un array',
        'regions.*.name.required' => 'Ogni regione deve avere un nome',
        'regions.*.name.string' => 'Il nome della regione deve essere una stringa',
        'regions.*.code.required' => 'Ogni regione deve avere un codice',
        'regions.*.code.string' => 'Il codice della regione deve essere una stringa',
        'regions.*.code.size' => 'Il codice della regione deve essere di 2 caratteri',
        'regions.*.provinces.required' => 'Ogni regione deve avere un array di province',
        'regions.*.provinces.array' => 'Le province devono essere un array',
        'regions.*.provinces.*.name.required' => 'Ogni provincia deve avere un nome',
        'regions.*.provinces.*.name.string' => 'Il nome della provincia deve essere una stringa',
        'regions.*.provinces.*.code.required' => 'Ogni provincia deve avere un codice',
        'regions.*.provinces.*.code.string' => 'Il codice della provincia deve essere una stringa',
        'regions.*.provinces.*.code.size' => 'Il codice della provincia deve essere di 2 caratteri',
        'regions.*.provinces.*.cities.required' => 'Ogni provincia deve avere un array di città',
        'regions.*.provinces.*.cities.array' => 'Le città devono essere un array',
        'regions.*.provinces.*.cities.*.name.required' => 'Ogni città deve avere un nome',
        'regions.*.provinces.*.cities.*.name.string' => 'Il nome della città deve essere una stringa',
        'regions.*.provinces.*.cities.*.code.required' => 'Ogni città deve avere un codice',
        'regions.*.provinces.*.cities.*.code.string' => 'Il codice della città deve essere una stringa',
        'regions.*.provinces.*.cities.*.cap.required' => 'Ogni città deve avere un CAP',
        'regions.*.provinces.*.cities.*.cap.string' => 'Il CAP deve essere una stringa',
        'regions.*.provinces.*.cities.*.cap.size' => 'Il CAP deve essere di 5 caratteri',
    ];

    /**
     * Valida i dati geografici.
     *
     * @param array $data Dati da validare
<<<<<<< HEAD
=======
     * @return bool
>>>>>>> be08416 (.)
     */
    public function validate(array $data): bool
    {
        $validator = Validator::make($data, self::VALIDATION_RULES, self::CUSTOM_MESSAGES);

<<<<<<< HEAD
        return ! $validator->fails();
=======
        return !$validator->fails();
>>>>>>> be08416 (.)
    }

    /**
     * Ottiene gli errori di validazione.
     *
     * @param array $data Dati da validare
<<<<<<< HEAD
     *
     * @return array<string, array<int, string>>
=======
     * @return array<string, string>
>>>>>>> be08416 (.)
     */
    public function getErrors(array $data): array
    {
        $validator = Validator::make($data, self::VALIDATION_RULES, self::CUSTOM_MESSAGES);

<<<<<<< HEAD
        /** @var array<string, array<int, string>> $errors */
        $errors = $validator->errors()->toArray();

        return $errors;
=======
        return $validator->errors()->toArray();
>>>>>>> be08416 (.)
    }

    /**
     * Verifica l'integrità dei dati.
     *
     * @param array $data Dati da verificare
<<<<<<< HEAD
     */
    public function checkIntegrity(array $data): bool
    {
        if (! $this->validate($data)) {
            return false;
        }

        if (! isset($data['regions']) || ! \is_array($data['regions'])) {
=======
     * @return bool
     */
    public function checkIntegrity(array $data): bool
    {
        if (!$this->validate($data)) {
>>>>>>> be08416 (.)
            return false;
        }

        // Verifica che i codici siano unici
        $regionCodes = [];
        $provinceCodes = [];
        $cityCodes = [];

        foreach ($data['regions'] as $region) {
<<<<<<< HEAD
            if (! \is_array($region) || ! isset($region['code'])) {
                return false;
            }
            if (\in_array($region['code'], $regionCodes, strict: true)) {
=======
            if (in_array($region['code'], $regionCodes, strict: true)) {
>>>>>>> be08416 (.)
                return false;
            }
            $regionCodes[] = $region['code'];

<<<<<<< HEAD
            if (! isset($region['provinces']) || ! \is_array($region['provinces'])) {
                return false;
            }

            foreach ($region['provinces'] as $province) {
                if (! \is_array($province) || ! isset($province['code'])) {
                    return false;
                }
                if (\in_array($province['code'], $provinceCodes, strict: true)) {
=======
            foreach ($region['provinces'] as $province) {
                if (in_array($province['code'], $provinceCodes, strict: true)) {
>>>>>>> be08416 (.)
                    return false;
                }
                $provinceCodes[] = $province['code'];

<<<<<<< HEAD
                if (! isset($province['cities']) || ! \is_array($province['cities'])) {
                    return false;
                }

                foreach ($province['cities'] as $city) {
                    if (! \is_array($city) || ! isset($city['code'])) {
                        return false;
                    }
                    if (\in_array($city['code'], $cityCodes, strict: true)) {
=======
                foreach ($province['cities'] as $city) {
                    if (in_array($city['code'], $cityCodes, strict: true)) {
>>>>>>> be08416 (.)
                        return false;
                    }
                    $cityCodes[] = $city['code'];
                }
            }
        }

        return true;
    }
}
