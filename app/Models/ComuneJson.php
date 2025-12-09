<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

<<<<<<< HEAD
=======
use Override;
>>>>>>> be08416 (.)
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Modello unico readonly per i comuni italiani (Facade pattern).
 *
 * Implementa il pattern Facade per fornire un'interfaccia unificata a tutti i dati geografici:
 * regioni, province, città, CAP, codici ISTAT, ecc.
 * Tutti i dati sono estratti da un'unica fonte (comuni.json) e gestiti tramite metodi statici.
 * Include un sistema di caching multilivello per ottimizzare le performance.
 *
 * @see GeoJsonModel Classe base per l'accesso ai dati JSON
 * @see docs/consolidamento-modelli-geografici.md Analisi comparativa della struttura
 * @see docs/comune-unificazione-analisi.md Analisi dell'unificazione dei modelli
 * @see docs/geo-json-model.md Documentazione tecnica del modello base
 */
class ComuneJson extends GeoJsonModel
{
    /**
<<<<<<< HEAD
     * Cache duration in seconds (1 week).
=======
     * Cache duration in seconds (1 week)
>>>>>>> be08416 (.)
     */
    protected const CACHE_TTL = 604800;

    /**
<<<<<<< HEAD
     * Get all comuni with their complete data.
=======
     * Get all comuni with their complete data
>>>>>>> be08416 (.)
     *
     * @return Collection<array-key, array{
     *     nome: string,
     *     codice: string,
     *     regione: array{codice: string, nome: string},
     *     provincia: array{codice: string, nome: string},
     *     cap: array<int, string>,
     *     codiceCatastale: string,
     *     popolazione: int
     * }>
     */
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> be08416 (.)
    public static function all(): Collection
    {
        return static::loadData();
    }

    /**
<<<<<<< HEAD
     * Get comuni by region code.
=======
     * Get comuni by region code
>>>>>>> be08416 (.)
     *
     * @return Collection<int, array{
     *     nome: string,
     *     codice: string,
     *     regione: array{codice: string, nome: string},
     *     provincia: array{codice: string, nome: string},
     *     cap: array<int, string>,
     *     codiceCatastale: string,
     *     popolazione: int
     * }>
     */
    public static function byRegion(string $regionCode): Collection
    {
        $cacheKey = "geo_region_{$regionCode}";

        /** @var Collection<int, array{
         *     nome: string,
         *     codice: string,
         *     regione: array{codice: string, nome: string},
         *     provincia: array{codice: string, nome: string},
         *     cap: array<int, string>,
         *     codiceCatastale: string,
         *     popolazione: int
         * }> $result */
        $result = Cache::remember($cacheKey, self::CACHE_TTL, static::all()
<<<<<<< HEAD
            ->where('regione.codice', $regionCode)
            ->sortBy('nome')
            ->values(...));

=======
                ->where('regione.codice', $regionCode)
                ->sortBy('nome')
                ->values(...));

        /** @var Collection<int, array{
         *     nome: string,
         *     codice: string,
         *     regione: array{codice: string, nome: string},
         *     provincia: array{codice: string, nome: string},
         *     cap: array<int, string>,
         *     codiceCatastale: string,
         *     popolazione: int
         * }> $result */
>>>>>>> be08416 (.)
        return $result;
    }

    /**
<<<<<<< HEAD
     * Get comuni by province code.
=======
     * Get comuni by province code
>>>>>>> be08416 (.)
     *
     * @return Collection<int, array{
     *     nome: string,
     *     codice: string,
     *     regione: array{codice: string, nome: string},
     *     provincia: array{codice: string, nome: string},
     *     cap: array<int, string>,
     *     codiceCatastale: string,
     *     popolazione: int
     * }>
     */
    public static function byProvince(string $provinceCode): Collection
    {
        $cacheKey = "geo_province_{$provinceCode}";

        /** @var Collection<int, array{
         *     nome: string,
         *     codice: string,
         *     regione: array{codice: string, nome: string},
         *     provincia: array{codice: string, nome: string},
         *     cap: array<int, string>,
         *     codiceCatastale: string,
         *     popolazione: int
         * }> $result */
        $result = Cache::remember($cacheKey, self::CACHE_TTL, static::all()
<<<<<<< HEAD
            ->where('provincia.codice', $provinceCode)
            ->sortBy('nome')
            ->values(...));

=======
                ->where('provincia.codice', $provinceCode)
                ->sortBy('nome')
                ->values(...));

        /** @var Collection<int, array{
         *     nome: string,
         *     codice: string,
         *     regione: array{codice: string, nome: string},
         *     provincia: array{codice: string, nome: string},
         *     cap: array<int, string>,
         *     codiceCatastale: string,
         *     popolazione: int
         * }> $result */
>>>>>>> be08416 (.)
        return $result;
    }

    /**
<<<<<<< HEAD
     * Get all comuni by name (case insensitive partial match).
     *
     * @param string $name  Nome parziale del comune da cercare
     * @param int    $limit Numero massimo di risultati (0 = nessun limite)
     *
=======
     * Get all comuni by name (case insensitive partial match)
     *
     * @param string $name Nome parziale del comune da cercare
     * @param int $limit Numero massimo di risultati (0 = nessun limite)
>>>>>>> be08416 (.)
     * @return Collection<int, array{
     *     nome: string,
     *     codice: string,
     *     regione: array{codice: string, nome: string},
     *     provincia: array{codice: string, nome: string},
     *     cap: array<int, string>,
     *     codiceCatastale: string,
     *     popolazione: int
     * }> Comuni che corrispondono alla ricerca
     */
    public static function searchByName(string $name, int $limit = 0): Collection
    {
        $name = mb_strtolower($name);
<<<<<<< HEAD
        $cacheKey = 'geo_search_'.md5($name).'_'.$limit;
=======
        $cacheKey = 'geo_search_' . md5($name) . '_' . $limit;
>>>>>>> be08416 (.)

        /** @var Collection<int, array{
         *     nome: string,
         *     codice: string,
         *     regione: array{codice: string, nome: string},
         *     provincia: array{codice: string, nome: string},
         *     cap: array<int, string>,
         *     codiceCatastale: string,
         *     popolazione: int
         * }> $result */
<<<<<<< HEAD
        $result = Cache::remember($cacheKey, self::CACHE_TTL, static function () use ($name, $limit) {
            $results = static::all()
                /* @phpstan-ignore nullCoalesce.offset */
                ->filter(static fn ($item) => str_contains(mb_strtolower($item['nome'] ?? ''), $name))
=======
        $result = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($name, $limit) {
            $results = static::all()
                /** @phpstan-ignore nullCoalesce.offset */
                ->filter(fn($item) => str_contains(mb_strtolower($item['nome'] ?? ''), $name))
>>>>>>> be08416 (.)
                ->sortBy('nome');

            return $limit > 0 ? $results->take($limit)->values() : $results->values();
        });

<<<<<<< HEAD
=======
        /** @var Collection<int, array{
         *     nome: string,
         *     codice: string,
         *     regione: array{codice: string, nome: string},
         *     provincia: array{codice: string, nome: string},
         *     cap: array<int, string>,
         *     codiceCatastale: string,
         *     popolazione: int
         * }> $result */
>>>>>>> be08416 (.)
        return $result;
    }

    /**
<<<<<<< HEAD
     * Get comuni by CAP.
=======
     * Get comuni by CAP
>>>>>>> be08416 (.)
     *
     * @return Collection<int, array{
     *     nome: string,
     *     codice: string,
     *     regione: array{codice: string, nome: string},
     *     provincia: array{codice: string, nome: string},
     *     cap: array<int, string>,
     *     codiceCatastale: string,
     *     popolazione: int
     * }>
     */
    public static function byCap(string $cap): Collection
    {
        /** @var Collection<int, array{
         *     nome: string,
         *     codice: string,
         *     regione: array{codice: string, nome: string},
         *     provincia: array{codice: string, nome: string},
         *     cap: array<int, string>,
         *     codiceCatastale: string,
         *     popolazione: int
         * }> $filtered */
        $filtered = static::all()
<<<<<<< HEAD
            /* @phpstan-ignore nullCoalesce.offset */
            ->filter(static fn ($item) => \in_array($cap, $item['cap'] ?? [], true))
=======
            /** @phpstan-ignore nullCoalesce.offset */
            ->filter(fn($item) => in_array($cap, $item['cap'] ?? [], true))
>>>>>>> be08416 (.)
            ->sortBy('nome')
            ->values();

        return $filtered;
    }

    /**
<<<<<<< HEAD
     * Get all regions with their codes and names.
=======
     * Get all regions with their codes and names
>>>>>>> be08416 (.)
     *
     * @return Collection<string, string> [code => name]
     */
    public static function allRegions(): Collection
    {
        /** @var Collection<string, string> $result */
        $result = Cache::remember('geo_all_regions', self::CACHE_TTL, static::all()
<<<<<<< HEAD
            ->pluck('regione.nome', 'regione.codice')
            ->unique()
            ->sort(...));
=======
                ->pluck('regione.nome', 'regione.codice')
                ->unique()
                ->sort(...));
>>>>>>> be08416 (.)

        return $result;
    }

    /**
<<<<<<< HEAD
     * Get all provinces with their codes and names.
=======
     * Get all provinces with their codes and names
>>>>>>> be08416 (.)
     *
     * @return Collection<string, string> [code => name]
     */
    public static function allProvinces(): Collection
    {
        /** @var Collection<string, string> $result */
        $result = Cache::remember('geo_all_provinces', self::CACHE_TTL, static::all()
<<<<<<< HEAD
            ->pluck('provincia.nome', 'provincia.codice')
            ->unique()
            ->sort(...));
=======
                ->pluck('provincia.nome', 'provincia.codice')
                ->unique()
                ->sort(...));
>>>>>>> be08416 (.)

        return $result;
    }

    /**
<<<<<<< HEAD
     * Get all provinces for a specific region.
=======
     * Get all provinces for a specific region
>>>>>>> be08416 (.)
     *
     * @return Collection<string, string> [code => name]
     */
    public static function getProvincesByRegion(string $regionCode): Collection
    {
        $cacheKey = "geo_region_{$regionCode}_provinces";

        /** @var Collection<string, string> $result */
        $result = Cache::remember($cacheKey, self::CACHE_TTL, static::all()
<<<<<<< HEAD
            ->where('regione.codice', $regionCode)
            ->pluck('provincia.nome', 'provincia.codice')
            ->unique()
            ->sort(...));
=======
                ->where('regione.codice', $regionCode)
                ->pluck('provincia.nome', 'provincia.codice')
                ->unique()
                ->sort(...));
>>>>>>> be08416 (.)

        return $result;
    }

    /**
<<<<<<< HEAD
     * Get all CAPs for a specific city.
=======
     * Get all CAPs for a specific city
>>>>>>> be08416 (.)
     *
     * @return Collection<int, string> List of CAP codes for the city
     */
    public static function getCapsByCity(string $cityName): Collection
    {
        /** @var Collection<int, string> $result */
        $result = static::all()
            ->where('nome', $cityName)
            ->pluck('cap')
            ->flatten()
            ->unique()
            ->sort()
            ->values();

        return $result;
    }

    /**
<<<<<<< HEAD
     * Clear all cached data.
     *
     * @param bool $verbose Se true, restituisce la lista delle chiavi di cache eliminate
     *
     * @return array<int, string>|null Lista delle chiavi di cache eliminate se $verbose è true
     */
    public static function clearCache(bool $verbose = false): ?array
=======
     * Clear all cached data
     *
     * @param bool $verbose Se true, restituisce la lista delle chiavi di cache eliminate
     * @return array<int, string>|null Lista delle chiavi di cache eliminate se $verbose è true
     */
    public static function clearCache(bool $verbose = false): null|array
>>>>>>> be08416 (.)
    {
        $clearedKeys = [];

        // Chiavi base
        $baseKeys = ['geo_all_regions', 'geo_all_provinces'];
        foreach ($baseKeys as $key) {
            Cache::forget($key);
            $clearedKeys[] = $key;
        }

        // Chiavi specifiche per regione
        static::allRegions()
<<<<<<< HEAD
            ->each(static function ($_nome, $code) use (&$clearedKeys): void {
=======
            ->each(function ($_nome, $code) use (&$clearedKeys) {
>>>>>>> be08416 (.)
                $keys = ["geo_region_{$code}", "geo_region_{$code}_provinces"];
                foreach ($keys as $key) {
                    Cache::forget($key);
                    $clearedKeys[] = $key;
                }
            });

        // Chiavi specifiche per provincia
        static::allProvinces()
<<<<<<< HEAD
            ->each(static function ($_nome, $code) use (&$clearedKeys): void {
=======
            ->each(function ($_nome, $code) use (&$clearedKeys) {
>>>>>>> be08416 (.)
                $key = "geo_province_{$code}";
                Cache::forget($key);
                $clearedKeys[] = $key;
            });

        // Nota: La pulizia delle chiavi di pattern matching è limitata
        // poiché non tutti i driver di cache supportano la ricerca per pattern
        // Le chiavi di ricerca più comuni vengono gestite esplicitamente
        $searchPatterns = [
            'geo_search_', // Ricerche generiche
            'geo_valid_cap_', // Validazione CAP
            'geo_gerarchia_', // Gerarchie geografiche
        ];

        // Puliamo alcune chiavi di ricerca comuni per essere sicuri
        foreach ($searchPatterns as $pattern) {
<<<<<<< HEAD
            for ($i = 0; $i < 10; ++$i) {
                $testKey = $pattern.md5((string) $i);
=======
            for ($i = 0; $i < 10; $i++) {
                $testKey = $pattern . md5((string) $i);
>>>>>>> be08416 (.)
                Cache::forget($testKey);
            }
        }

        return $verbose ? $clearedKeys : null;
    }

    /**
<<<<<<< HEAD
     * Verifica se il CAP esiste nel database.
     *
     * @param string $cap CAP da verificare
     *
=======
     * Verifica se il CAP esiste nel database
     *
     * @param string $cap CAP da verificare
>>>>>>> be08416 (.)
     * @return bool True se il CAP esiste, false altrimenti
     */
    public static function isValidCap(string $cap): bool
    {
        $cacheKey = "geo_valid_cap_{$cap}";

        /** @var bool $result */
        $result = Cache::remember($cacheKey, self::CACHE_TTL, static::byCap($cap)->isNotEmpty(...));

        return $result;
    }

    /**
<<<<<<< HEAD
     * Ottiene la gerarchia completa per un comune (regione, provincia, comune, cap).
     *
     * @param string $comuneNome Nome esatto del comune
     *
=======
     * Ottiene la gerarchia completa per un comune (regione, provincia, comune, cap)
     *
     * @param string $comuneNome Nome esatto del comune
>>>>>>> be08416 (.)
     * @return array{
     *     regione: array{codice: string, nome: string}|null,
     *     provincia: array{codice: string, nome: string}|null,
     *     comune: array{
     *         nome: string,
     *         codice: string|null,
     *         codiceCatastale: string|null,
     *         popolazione: int|null
     *     },
     *     cap: array<int, string>
     * }|null Gerarchia completa o null se il comune non esiste
     */
<<<<<<< HEAD
    public static function getGerarchia(string $comuneNome): ?array
    {
        $cacheKey = 'geo_gerarchia_'.md5($comuneNome);
=======
    public static function getGerarchia(string $comuneNome): null|array
    {
        $cacheKey = 'geo_gerarchia_' . md5($comuneNome);
>>>>>>> be08416 (.)

        /** @var array{
         *     regione: array{codice: string, nome: string}|null,
         *     provincia: array{codice: string, nome: string}|null,
         *     comune: array{
         *         nome: string,
         *         codice: string|null,
         *         codiceCatastale: string|null,
         *         popolazione: int|null
         *     },
         *     cap: array<int, string>
         * }|null $result */
<<<<<<< HEAD
        $result = Cache::remember($cacheKey, self::CACHE_TTL, static function () use ($comuneNome) {
=======
        $result = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($comuneNome) {
>>>>>>> be08416 (.)
            /** @var array{
             *     nome: string,
             *     codice: string,
             *     regione: array{codice: string, nome: string},
             *     provincia: array{codice: string, nome: string},
             *     cap: array<int, string>,
             *     codiceCatastale: string,
             *     popolazione: int
             * }|null $comune */
            $comune = static::searchByName($comuneNome, 1)->first();

<<<<<<< HEAD
            if (! $comune) {
=======
            if (!$comune) {
>>>>>>> be08416 (.)
                return null;
            }

            return [
                'regione' => $comune['regione'] ?? null,
                'provincia' => $comune['provincia'] ?? null,
                'comune' => [
                    'nome' => $comune['nome'],
                    'codice' => $comune['codice'] ?? null,
                    'codiceCatastale' => $comune['codiceCatastale'] ?? null,
                    'popolazione' => $comune['popolazione'] ?? null,
                ],
                'cap' => $comune['cap'] ?? [],
            ];
        });

        return $result;
    }

    /**
<<<<<<< HEAD
     * Restituisce regole di validazione Laravel per form geografici.
     *
     * @param bool $required Se true, tutti i campi sono obbligatori
     *
=======
     * Restituisce regole di validazione Laravel per form geografici
     *
     * @param bool $required Se true, tutti i campi sono obbligatori
>>>>>>> be08416 (.)
     * @return array<string, array<int, mixed>> Regole di validazione
     */
    public static function getValidationRules(bool $required = true): array
    {
        $requiredRule = $required ? 'required' : 'nullable';

        return [
            'regione_codice' => [
                $requiredRule,
                'string',
<<<<<<< HEAD
                static function ($_attribute, $value, $fail): void {
                    if (\is_string($value) && ! static::allRegions()->has($value)) {
                        /* @phpstan-ignore callable.nonCallable */
=======
                function ($_attribute, $value, $fail) {
                    if (!static::allRegions()->has($value)) {
>>>>>>> be08416 (.)
                        $fail('La regione selezionata non è valida.');
                    }
                },
            ],
            'provincia_codice' => [
                $requiredRule,
                'string',
<<<<<<< HEAD
                static function ($_attribute, $value, $fail): void {
                    if (\is_string($value) && ! static::allProvinces()->has($value)) {
                        /* @phpstan-ignore callable.nonCallable */
=======
                function ($_attribute, $value, $fail) {
                    if (!static::allProvinces()->has($value)) {
>>>>>>> be08416 (.)
                        $fail('La provincia selezionata non è valida.');
                    }
                },
            ],
            'comune_nome' => [
                $requiredRule,
                'string',
<<<<<<< HEAD
                static function ($_attribute, $value, $fail): void {
                    if (\is_string($value) && ! empty($value) && static::searchByName($value, 1)->isEmpty()) {
                        /* @phpstan-ignore callable.nonCallable */
=======
                function ($_attribute, $value, $fail) {
                    if (!empty($value) && static::searchByName($value, 1)->isEmpty()) {
>>>>>>> be08416 (.)
                        $fail('Il comune selezionato non è valido.');
                    }
                },
            ],
            'cap' => [
                $requiredRule,
                'string',
<<<<<<< HEAD
                static function ($_attribute, $value, $fail): void {
                    if (\is_string($value) && ! empty($value) && ! static::isValidCap($value)) {
                        /* @phpstan-ignore callable.nonCallable */
=======
                function ($_attribute, $value, $fail) {
                    if (!empty($value) && !static::isValidCap($value)) {
>>>>>>> be08416 (.)
                        $fail('Il CAP inserito non è valido.');
                    }
                },
            ],
        ];
    }
}
