<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
=======
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use RuntimeException;
>>>>>>> 1bb689f (.)
=======
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
>>>>>>> 0746367 (.)
use Sushi\Sushi;

trait SushiToJsons
{
    use Sushi;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Carica i dati dal file JSON.
=======
     * Carica i dati dal file JSON
>>>>>>> 1bb689f (.)
=======
     * Carica i dati dal file JSON.
>>>>>>> 0746367 (.)
     */
    public function getSushiRows(): array
    {
        return Cache::remember($this->getCacheKey(), $this->getCacheDuration(), $this->loadFromJson(...));
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Ottiene il percorso del file JSON.
=======
     * Ottiene il percorso del file JSON
>>>>>>> 1bb689f (.)
=======
     * Ottiene il percorso del file JSON.
>>>>>>> 0746367 (.)
     */
    public function getJsonFile(): string
    {
        return base_path('database/content/comuni.json');
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Salva i dati nel file JSON.
=======
     * Salva i dati nel file JSON
>>>>>>> 1bb689f (.)
=======
     * Salva i dati nel file JSON.
>>>>>>> 0746367 (.)
     */
    public function saveToJson(array $data): bool
    {
        $path = $this->getJsonFile();

        try {
            File::put($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            Cache::forget($this->getCacheKey());

            return true;
<<<<<<< HEAD
<<<<<<< HEAD
        } catch (\Exception $e) {
=======
        } catch (Exception $e) {
>>>>>>> 1bb689f (.)
=======
        } catch (\Exception $e) {
>>>>>>> 0746367 (.)
            report($e);

            return false;
        }
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Crea un nuovo record.
=======
     * Crea un nuovo record
>>>>>>> 1bb689f (.)
=======
     * Crea un nuovo record.
>>>>>>> 0746367 (.)
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
=======
        throw new \RuntimeException('Impossibile salvare il record');
    }

    /**
     * Aggiorna un record esistente.
>>>>>>> 0746367 (.)
     */
    public function update(array $attributes = []): bool
    {
        $data = $this->loadFromJson();
        $index = $this->findIndex($this->getKey());

<<<<<<< HEAD
<<<<<<< HEAD
        if (null === $index) {
=======
        if ($index === null) {
>>>>>>> 1bb689f (.)
=======
        if (null === $index) {
>>>>>>> 0746367 (.)
            return false;
        }

        $attributes['updated_at'] = now();
        $data[$index] = array_merge($data[$index], $attributes);

        return $this->saveToJson($data);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Elimina un record.
=======
     * Elimina un record
>>>>>>> 1bb689f (.)
=======
     * Elimina un record.
>>>>>>> 0746367 (.)
     */
    public function delete(): bool
    {
        $data = $this->loadFromJson();
        $index = $this->findIndex($this->getKey());

<<<<<<< HEAD
<<<<<<< HEAD
        if (null === $index) {
=======
        if ($index === null) {
>>>>>>> 1bb689f (.)
=======
        if (null === $index) {
>>>>>>> 0746367 (.)
            return false;
        }

        array_splice($data, $index, 1);

        return $this->saveToJson($data);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Carica i dati dal file JSON.
=======
     * Carica i dati dal file JSON
>>>>>>> 1bb689f (.)
=======
     * Carica i dati dal file JSON.
>>>>>>> 0746367 (.)
     */
    protected function loadFromJson(): array
    {
        $path = $this->getJsonFile();

        if (! File::exists($path)) {
            return [];
        }

        $data = json_decode(File::get($path), true);

<<<<<<< HEAD
<<<<<<< HEAD
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \RuntimeException('Errore nel parsing del file JSON: '.json_last_error_msg());
=======
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Errore nel parsing del file JSON: '.json_last_error_msg());
>>>>>>> 1bb689f (.)
=======
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \RuntimeException('Errore nel parsing del file JSON: '.json_last_error_msg());
>>>>>>> 0746367 (.)
        }

        return $data;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Ottiene la chiave di cache.
=======
     * Ottiene la chiave di cache
>>>>>>> 1bb689f (.)
=======
     * Ottiene la chiave di cache.
>>>>>>> 0746367 (.)
     */
    protected function getCacheKey(): string
    {
        return 'sushi_'.class_basename($this).'_data';
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Ottiene la durata della cache in secondi.
=======
     * Ottiene la durata della cache in secondi
>>>>>>> 1bb689f (.)
=======
     * Ottiene la durata della cache in secondi.
>>>>>>> 0746367 (.)
     */
    protected function getCacheDuration(): int
    {
        return 60 * 24 * 7; // 7 giorni
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Trova l'indice di un record.
=======
     * Trova l'indice di un record
>>>>>>> 1bb689f (.)
=======
     * Trova l'indice di un record.
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
     * Genera un nuovo ID.
=======
     * Genera un nuovo ID
>>>>>>> 1bb689f (.)
=======
     * Genera un nuovo ID.
>>>>>>> 0746367 (.)
     */
    protected function generateId(): string
    {
        return uniqid('comune_', true);
    }
}
