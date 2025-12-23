<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Tenant\Models\Traits\SushiToJson;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Override;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

/**
 * Modello per i comuni italiani con Sushi.
 *
 * Implementa il pattern Facade per fornire un'interfaccia unificata a tutti i dati geografici:
 * regioni, province, città, CAP, codici ISTAT, ecc.
 * Tutti i dati sono estratti da file JSON e gestiti tramite Sushi.
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
 * @property string|null                                 $nome
 * @property float|null                                  $codice
 * @property array<array-key, mixed>|null                $zona
 * @property array<array-key, mixed>|null                $regione
 * @property array<array-key, mixed>|null                $provincia
 * @property string|null                                 $sigla
 * @property string|null                                 $codiceCatastale
 * @property array<array-key, mixed>|null                $cap
 * @property int|null                                    $popolazione
 * @property int|null                                    $id
 * @property string|null                                 $title
 * @property string|null                                 $slug
 * @property string|null                                 $content
 * @property string|null                                 $created_at
 * @property string|null                                 $updated_at
 * @property string|null                                 $created_by
 * @property string|null                                 $updated_by
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
<<<<<<< HEAD
=======
 * @property string|null $nome
 * @property float|null $codice
 * @property array<array-key, mixed>|null $zona
 * @property array<array-key, mixed>|null $regione
 * @property array<array-key, mixed>|null $provincia
 * @property string|null $sigla
 * @property string|null $codiceCatastale
 * @property array<array-key, mixed>|null $cap
 * @property int|null $popolazione
 * @property int|null $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read \Modules\Quaeris\Models\Profile|null $creator
 * @property-read \Modules\Quaeris\Models\Profile|null $updater
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
 *
 * @method static Builder<static>|Comune newModelQuery()
 * @method static Builder<static>|Comune newQuery()
 * @method static Builder<static>|Comune query()
 * @method static Builder<static>|Comune whereCap($value)
 * @method static Builder<static>|Comune whereCodice($value)
 * @method static Builder<static>|Comune whereCodiceCatastale($value)
 * @method static Builder<static>|Comune whereContent($value)
 * @method static Builder<static>|Comune whereCreatedAt($value)
 * @method static Builder<static>|Comune whereCreatedBy($value)
 * @method static Builder<static>|Comune whereId($value)
 * @method static Builder<static>|Comune whereNome($value)
 * @method static Builder<static>|Comune wherePopolazione($value)
 * @method static Builder<static>|Comune whereProvincia($value)
 * @method static Builder<static>|Comune whereRegione($value)
 * @method static Builder<static>|Comune whereSigla($value)
 * @method static Builder<static>|Comune whereSlug($value)
 * @method static Builder<static>|Comune whereTitle($value)
 * @method static Builder<static>|Comune whereUpdatedAt($value)
 * @method static Builder<static>|Comune whereUpdatedBy($value)
 * @method static Builder<static>|Comune whereZona($value)
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
 * @property \Modules\Xot\Contracts\ProfileContract|null $deleter
 *
 * @method static \Modules\Geo\Database\Factories\ComuneFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
=======
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
 * @mixin \Eloquent
 */
class Comune extends BaseModel
{
    use SushiToJson;

    public string $jsonDirectory = '';

    /** @var array<int, string> */
    public $translatable = [];

    /** @var list<string> */
    protected $fillable = [
        'id',
        'codice',
        'nome',
        'regione',
        'provincia',
        'sigla_provincia',
        'cap',
        'codice_catastale',
        'popolazione',
        'zona_altimetrica',
        'altitudine',
        'superficie',
        'lat',
        'lng',
    ];

    protected array $schema = [
        'id' => 'integer',
        'title' => 'json',
        'slug' => 'string',
        'content' => 'string',
        'zona' => 'json',
        'provincia' => 'json',
        'regione' => 'json',
        'cap' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_by' => 'string',
        'updated_by' => 'string',
    ];

    public function getJsonFile(): string
    {
        return module_path('Geo', 'resources/json/comuni.json');
    }

    public function getRows(): array
    {
        return $this->getSushiRows();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get all regions.
=======
     * Get all regions
>>>>>>> 1bb689f (.)
=======
     * Get all regions.
>>>>>>> 0746367 (.)
     *
     * @return Collection<string>
     */
    public static function getRegioni(): Collection
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore return.type */
=======
        /** @phpstan-ignore return.type */
>>>>>>> 1bb689f (.)
=======
        /* @phpstan-ignore return.type */
>>>>>>> 0746367 (.)
        return static::all()
            ->pluck('regione')
            ->unique()
            ->sort()
            ->values();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get all provinces for a region.
=======
     * Get all provinces for a region
>>>>>>> 1bb689f (.)
=======
     * Get all provinces for a region.
>>>>>>> 0746367 (.)
     *
     * @return Collection<string>
     */
    public static function getProvinceByRegione(string $regione): Collection
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore return.type */
=======
        /** @phpstan-ignore return.type */
>>>>>>> 1bb689f (.)
=======
        /* @phpstan-ignore return.type */
>>>>>>> 0746367 (.)
        return static::where('regione', $regione)
            ->pluck('provincia')
            ->unique()
            ->sort()
            ->values();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get all comuni for a province.
=======
     * Get all comuni for a province
>>>>>>> 1bb689f (.)
=======
     * Get all comuni for a province.
>>>>>>> 0746367 (.)
     *
     * @return Collection<static>
     */
    public static function getComuniByProvincia(string $provincia): Collection
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore return.type */
=======
        /** @phpstan-ignore return.type */
>>>>>>> 1bb689f (.)
=======
        /* @phpstan-ignore return.type */
>>>>>>> 0746367 (.)
        return static::where('provincia', $provincia)->orderBy('nome')->get();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Find a comune by name (case insensitive).
     *
     * @param string $nome The name of the comune to find (case insensitive)
     *
=======
     * Find a comune by name (case insensitive)
     *
     * @param  string  $nome  The name of the comune to find (case insensitive)
>>>>>>> 1bb689f (.)
=======
     * Find a comune by name (case insensitive).
     *
     * @param string $nome The name of the comune to find (case insensitive)
     *
>>>>>>> 0746367 (.)
     * @return static|null The found comune or null if not found
     */
    public static function findByNome(string $nome): ?self
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore return.type */
=======
        /** @phpstan-ignore return.type */
>>>>>>> 1bb689f (.)
=======
        /* @phpstan-ignore return.type */
>>>>>>> 0746367 (.)
        return static::all()
            ->first(fn ($comune) => strtolower($comune->nome ?? '') === strtolower($nome));
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Find comuni by CAP code (partial match supported).
     *
     * @param string $cap The CAP code to search for
     *
=======
     * Find comuni by CAP code (partial match supported)
     *
     * @param  string  $cap  The CAP code to search for
>>>>>>> 1bb689f (.)
=======
     * Find comuni by CAP code (partial match supported).
     *
     * @param string $cap The CAP code to search for
     *
>>>>>>> 0746367 (.)
     * @return Collection<static> Collection of matching comuni
     */
    public static function findByCap(string $cap): Collection
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore return.type */
=======
        /** @phpstan-ignore return.type */
>>>>>>> 1bb689f (.)
=======
        /* @phpstan-ignore return.type */
>>>>>>> 0746367 (.)
        return static::where('cap', 'like', "%{$cap}%")->get();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Find a city by ID.
=======
     * Find a city by ID
>>>>>>> 1bb689f (.)
=======
     * Find a city by ID.
>>>>>>> 0746367 (.)
     *
     * @return array{id: int, nome: string, provincia: string, regione: string, cap: string, codice_catastale: string, popolazione: int, altitudine: int, superficie: float, lat: float, lng: float, zona_altimetrica: string}|null
     */
    public static function findComune(int $id): ?array
    {
        $comune = static::query()->where('id', $id)->first();

<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore return.type */
=======
        /** @phpstan-ignore return.type */
>>>>>>> 1bb689f (.)
=======
        /* @phpstan-ignore return.type */
>>>>>>> 0746367 (.)
        return $comune ? $comune->toArray() : null;
    }

    /**
     * Get the directory where Comune JSON files are stored.
     */
    public function getJsonDirectory(): string
    {
        return $this->jsonDirectory;
    }

    /**
     * Set the directory where Comune JSON files are stored.
     */
    public function setJsonDirectory(string $directory): void
    {
        $this->jsonDirectory = $directory;
    }

    /** @return array<string, string>     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 1bb689f (.)
=======
    #[\Override]
>>>>>>> 0746367 (.)
    protected function casts(): array
    {
        return [
            'regione' => 'array',
            'zona' => 'array',
            'provincia' => 'array',
            'cap' => 'array',
        ];
    }
}
