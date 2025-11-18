<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

<<<<<<< HEAD
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
=======
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use RuntimeException;
>>>>>>> 1bb689f (.)
use Sushi\Sushi;

trait SushiToJsons
{
    use Sushi;

    /**
<<<<<<< HEAD
     * Carica i dati dal file JSON.
=======
     * Carica i dati dal file JSON
>>>>>>> 1bb689f (.)
     */
    public function getSushiRows(): array
    {
        return Cache::remember($this->getCacheKey(), $this->getCacheDuration(), $this->loadFromJson(...));
    }

    /**
<<<<<<< HEAD
     * Ottiene il percorso del file JSON.
=======
     * Ottiene il percorso del file JSON
>>>>>>> 1bb689f (.)
     */
    public function getJsonFile(): string
    {
        return base_path('database/content/comuni.json');
    }

    /**
<<<<<<< HEAD
     * Salva i dati nel file JSON.
=======
     * Salva i dati nel file JSON
>>>>>>> 1bb689f (.)
     */
    public function saveToJson(array $data): bool
    {
        $path = $this->getJsonFile();

        try {
            File::put($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            Cache::forget($this->getCacheKey());

            return true;
<<<<<<< HEAD
        } catch (\Exception $e) {
=======
        } catch (Exception $e) {
>>>>>>> 1bb689f (.)
            report($e);

            return false;
        }
    }

    /**
<<<<<<< HEAD
     * Crea un nuovo record.
=======
     * Crea un nuovo record
>>>>>>> 1bb689f (.)
     */
    public function create(array $attributes = []): static
    {
        $data = $this->loadFromJson();
        $attributes['id'] = $this->generateId();
        $attributes['created_at'] = now();
        $attributes['updated_at'] = now();

        $data[] = $attributes;

        if ($this->saveToJson($data)) {
            return $this->newInstance($attributes);
        }

<<<<<<< HEAD
        throw new \RuntimeException('Impossibile salvare il record');
    }

    /**
     * Aggiorna un record esistente.
=======
        throw new RuntimeException('Impossibile salvare il record');
    }

    /**
     * Aggiorna un record esistente
>>>>>>> 1bb689f (.)
     */
    public function update(array $attributes = []): bool
    {
        $data = $this->loadFromJson();
        $index = $this->findIndex($this->getKey());

<<<<<<< HEAD
        if (null === $index) {
=======
        if ($index === null) {
>>>>>>> 1bb689f (.)
            return false;
        }

        $attributes['updated_at'] = now();
        $data[$index] = array_merge($data[$index], $attributes);

        return $this->saveToJson($data);
    }

    /**
<<<<<<< HEAD
     * Elimina un record.
=======
     * Elimina un record
>>>>>>> 1bb689f (.)
     */
    public function delete(): bool
    {
        $data = $this->loadFromJson();
        $index = $this->findIndex($this->getKey());

<<<<<<< HEAD
        if (null === $index) {
=======
        if ($index === null) {
>>>>>>> 1bb689f (.)
            return false;
        }

        array_splice($data, $index, 1);

        return $this->saveToJson($data);
    }

    /**
<<<<<<< HEAD
     * Carica i dati dal file JSON.
=======
     * Carica i dati dal file JSON
>>>>>>> 1bb689f (.)
     */
    protected function loadFromJson(): array
    {
        $path = $this->getJsonFile();

        if (! File::exists($path)) {
            return [];
        }

        $data = json_decode(File::get($path), true);

<<<<<<< HEAD
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \RuntimeException('Errore nel parsing del file JSON: '.json_last_error_msg());
=======
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Errore nel parsing del file JSON: '.json_last_error_msg());
>>>>>>> 1bb689f (.)
        }

        return $data;
    }

    /**
<<<<<<< HEAD
     * Ottiene la chiave di cache.
=======
     * Ottiene la chiave di cache
>>>>>>> 1bb689f (.)
     */
    protected function getCacheKey(): string
    {
        return 'sushi_'.class_basename($this).'_data';
    }

    /**
<<<<<<< HEAD
     * Ottiene la durata della cache in secondi.
=======
     * Ottiene la durata della cache in secondi
>>>>>>> 1bb689f (.)
     */
    protected function getCacheDuration(): int
    {
        return 60 * 24 * 7; // 7 giorni
    }

    /**
<<<<<<< HEAD
     * Trova l'indice di un record.
=======
     * Trova l'indice di un record
>>>>>>> 1bb689f (.)
     */
    protected function findIndex($id): ?int
    {
        $data = $this->loadFromJson();

        foreach ($data as $index => $item) {
            if ($item['id'] === $id) {
                return $index;
            }
        }

        return null;
    }

    /**
<<<<<<< HEAD
     * Genera un nuovo ID.
=======
     * Genera un nuovo ID
>>>>>>> 1bb689f (.)
     */
    protected function generateId(): string
    {
        return uniqid('comune_', true);
    }
}
