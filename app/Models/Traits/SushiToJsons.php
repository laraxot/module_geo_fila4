<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

<<<<<<< HEAD
=======
use RuntimeException;
use Exception;
>>>>>>> be08416 (.)
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Sushi\Sushi;

trait SushiToJsons
{
    use Sushi;

    /**
<<<<<<< HEAD
     * Carica i dati dal file JSON.
=======
     * Carica i dati dal file JSON
>>>>>>> be08416 (.)
     */
    public function getSushiRows(): array
    {
        return Cache::remember($this->getCacheKey(), $this->getCacheDuration(), $this->loadFromJson(...));
    }

    /**
<<<<<<< HEAD
     * Ottiene il percorso del file JSON.
=======
     * Carica i dati dal file JSON
     */
    protected function loadFromJson(): array
    {
        $path = $this->getJsonFile();

        if (!File::exists($path)) {
            return [];
        }

        $data = json_decode(File::get($path), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Errore nel parsing del file JSON: ' . json_last_error_msg());
        }

        return $data;
    }

    /**
     * Ottiene il percorso del file JSON
>>>>>>> be08416 (.)
     */
    public function getJsonFile(): string
    {
        return base_path('database/content/comuni.json');
    }

    /**
<<<<<<< HEAD
     * Salva i dati nel file JSON.
=======
     * Ottiene la chiave di cache
     */
    protected function getCacheKey(): string
    {
        return 'sushi_' . class_basename($this) . '_data';
    }

    /**
     * Ottiene la durata della cache in secondi
     */
    protected function getCacheDuration(): int
    {
        return 60 * 24 * 7; // 7 giorni
    }

    /**
     * Salva i dati nel file JSON
>>>>>>> be08416 (.)
     */
    public function saveToJson(array $data): bool
    {
        $path = $this->getJsonFile();

        try {
            File::put($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            Cache::forget($this->getCacheKey());
<<<<<<< HEAD

            return true;
        } catch (\Exception $e) {
            report($e);

=======
            return true;
        } catch (Exception $e) {
            report($e);
>>>>>>> be08416 (.)
            return false;
        }
    }

    /**
<<<<<<< HEAD
     * Crea un nuovo record.
=======
     * Crea un nuovo record
>>>>>>> be08416 (.)
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
>>>>>>> be08416 (.)
     */
    public function update(array $attributes = []): bool
    {
        $data = $this->loadFromJson();
        $index = $this->findIndex($this->getKey());

<<<<<<< HEAD
        if (null === $index) {
=======
        if ($index === null) {
>>>>>>> be08416 (.)
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
>>>>>>> be08416 (.)
     */
    public function delete(): bool
    {
        $data = $this->loadFromJson();
        $index = $this->findIndex($this->getKey());

<<<<<<< HEAD
        if (null === $index) {
=======
        if ($index === null) {
>>>>>>> be08416 (.)
            return false;
        }

        array_splice($data, $index, 1);

        return $this->saveToJson($data);
    }

    /**
<<<<<<< HEAD
     * Carica i dati dal file JSON.
     */
    protected function loadFromJson(): array
    {
        $path = $this->getJsonFile();

        if (! File::exists($path)) {
            return [];
        }

        $data = json_decode(File::get($path), true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \RuntimeException('Errore nel parsing del file JSON: '.json_last_error_msg());
        }

        return $data;
    }

    /**
     * Ottiene la chiave di cache.
     */
    protected function getCacheKey(): string
    {
        return 'sushi_'.class_basename($this).'_data';
    }

    /**
     * Ottiene la durata della cache in secondi.
     */
    protected function getCacheDuration(): int
    {
        return 60 * 24 * 7; // 7 giorni
    }

    /**
     * Trova l'indice di un record.
     */
    protected function findIndex($id): ?int
=======
     * Trova l'indice di un record
     */
    protected function findIndex($id): null|int
>>>>>>> be08416 (.)
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
>>>>>>> be08416 (.)
     */
    protected function generateId(): string
    {
        return uniqid('comune_', true);
    }
}
