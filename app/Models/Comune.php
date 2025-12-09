<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Tenant\Models\Traits\SushiToJson;
=======
use Override;
use Modules\User\Models\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Models\Traits\SushiToJson;
use Sushi\Sushi;
>>>>>>> be08416 (.)

/**
 * Modello per i comuni italiani con Sushi.
 *
 * Implementa il pattern Facade per fornire un'interfaccia unificata a tutti i dati geografici:
 * regioni, province, città, CAP, codici ISTAT, ecc.
 * Tutti i dati sono estratti da file JSON e gestiti tramite Sushi.
 *
<<<<<<< HEAD
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
 *
=======
 * @property int $id
 * @property string $nome
 * @property string $codice
 * @property string $regione
 * @property string $provincia
 * @property string $sigla_provincia
 * @property string $cap
 * @property string $codice_catastale
 * @property int $popolazione
 * @property string $zona_altimetrica
 * @property int $altitudine
 * @property float $superficie
 * @property float $lat
 * @property float $lng
 * @property array<array-key, mixed>|null $zona
 * @property string|null $sigla
 * @property string|null $codiceCatastale
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
>>>>>>> be08416 (.)
 * @method static Builder<static>|Comune newModelQuery()
 * @method static Builder<static>|Comune newQuery()
 * @method static Builder<static>|Comune query()
 * @method static Builder<static>|Comune whereCap($value)
 * @method static Builder<static>|Comune whereCodice($value)
 * @method static Builder<static>|Comune whereCodiceCatastale($value)
<<<<<<< HEAD
 * @method static Builder<static>|Comune whereContent($value)
 * @method static Builder<static>|Comune whereCreatedAt($value)
 * @method static Builder<static>|Comune whereCreatedBy($value)
=======
>>>>>>> be08416 (.)
 * @method static Builder<static>|Comune whereId($value)
 * @method static Builder<static>|Comune whereNome($value)
 * @method static Builder<static>|Comune wherePopolazione($value)
 * @method static Builder<static>|Comune whereProvincia($value)
 * @method static Builder<static>|Comune whereRegione($value)
 * @method static Builder<static>|Comune whereSigla($value)
<<<<<<< HEAD
 * @method static Builder<static>|Comune whereSlug($value)
 * @method static Builder<static>|Comune whereTitle($value)
 * @method static Builder<static>|Comune whereUpdatedAt($value)
 * @method static Builder<static>|Comune whereUpdatedBy($value)
 * @method static Builder<static>|Comune whereZona($value)
 *
=======
 * @method static Builder<static>|Comune whereZona($value)
 * @mixin IdeHelperComune
>>>>>>> be08416 (.)
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

<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
    /**
     * @return array<int, array<string, mixed>>
     */
=======
>>>>>>> be08416 (.)
    public function getRows(): array
    {
        return $this->getSushiRows();
    }

<<<<<<< HEAD
    /**
     * Get all regions.
     *
     * @return Collection<string>
     */
    public static function getRegioni(): Collection
    {
        /* @phpstan-ignore return.type */
        return static::all()
            ->pluck('regione')
            ->unique()
            ->sort()
            ->values();
    }

    /**
     * Get all provinces for a region.
     *
     * @return Collection<string>
     */
    public static function getProvinceByRegione(string $regione): Collection
    {
        /* @phpstan-ignore return.type */
        return static::where('regione', $regione)
            ->pluck('provincia')
            ->unique()
            ->sort()
            ->values();
    }

    /**
     * Get all comuni for a province.
     *
     * @return Collection<static>
     */
    public static function getComuniByProvincia(string $provincia): Collection
    {
        /* @phpstan-ignore return.type */
        return static::where('provincia', $provincia)->orderBy('nome')->get();
    }

    /**
     * Find a comune by name (case insensitive).
     *
     * @param string $nome The name of the comune to find (case insensitive)
     *
     * @return static|null The found comune or null if not found
     */
    public static function findByNome(string $nome): ?self
    {
        /* @phpstan-ignore return.type */
        return static::all()
            ->first(fn ($comune) => strtolower($comune->nome ?? '') === strtolower($nome));
    }

    /**
     * Find comuni by CAP code (partial match supported).
     *
     * @param string $cap The CAP code to search for
     *
     * @return Collection<static> Collection of matching comuni
     */
    public static function findByCap(string $cap): Collection
    {
        /* @phpstan-ignore return.type */
        return static::where('cap', 'like', "%{$cap}%")->get();
    }

    /**
     * Find a city by ID.
     *
     * @return array{id: int, nome: string, provincia: string, regione: string, cap: string, codice_catastale: string, popolazione: int, altitudine: int, superficie: float, lat: float, lng: float, zona_altimetrica: string}|null
     */
    public static function findComune(int $id): ?array
    {
        $comune = static::query()->where('id', $id)->first();

        /* @phpstan-ignore return.type */
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
    #[\Override]
=======
    /** @return array<string, string>     */
    #[Override]
>>>>>>> be08416 (.)
    protected function casts(): array
    {
        return [
            'regione' => 'array',
            'zona' => 'array',
            'provincia' => 'array',
            'cap' => 'array',
        ];
    }
<<<<<<< HEAD
=======

    /**
     * Get all regions
     *
     * @return Collection<string>
     */
    public static function getRegioni(): Collection
    {
        /** @phpstan-ignore return.type */
        return static::all()
            ->pluck('regione')
            ->unique()
            ->sort()
            ->values();
    }

    /**
     * Get all provinces for a region
     *
     * @param string $regione
     * @return Collection<string>
     */
    public static function getProvinceByRegione(string $regione): Collection
    {
        /** @phpstan-ignore return.type */
        return static::where('regione', $regione)
            ->pluck('provincia')
            ->unique()
            ->sort()
            ->values();
    }

    /**
     * Get all comuni for a province
     *
     * @param string $provincia
     * @return Collection<static>
     */
    public static function getComuniByProvincia(string $provincia): Collection
    {
        /** @phpstan-ignore return.type */
        return static::where('provincia', $provincia)->orderBy('nome')->get();
    }

    /**
     * Find a comune by name (case insensitive)
     *
     * @param string $nome The name of the comune to find (case insensitive)
     * @return static|null The found comune or null if not found
     */
    public static function findByNome(string $nome): null|self
    {
        /** @phpstan-ignore return.type */
        return static::all()
            ->first(fn (self $comune) => strtolower((string) $comune->nome) === strtolower($nome));
    }

    /**
     * Find comuni by CAP code (partial match supported)
     *
     * @param string $cap The CAP code to search for
     * @return Collection<static> Collection of matching comuni
     */
    public static function findByCap(string $cap): Collection
    {
        /** @phpstan-ignore return.type */
        return static::where('cap', 'like', "%{$cap}%")->get();
    }

    /**
     * Find a city by ID
     *
     * @param int $id
     * @return array{id: int, nome: string, provincia: string, regione: string, cap: string, codice_catastale: string, popolazione: int, altitudine: int, superficie: float, lat: float, lng: float, zona_altimetrica: string}|null
     */
    public static function findComune(int $id): null|array
    {
        $comune = static::query()->where('id', $id)->first();

        /** @phpstan-ignore return.type */
        return $comune ? $comune->toArray() : null;
    }

    /**
     * Get the directory where Comune JSON files are stored.
     *
     * @return string
     */
    public function getJsonDirectory(): string
    {
        return $this->jsonDirectory;
    }

    /**
     * Set the directory where Comune JSON files are stored.
     *
     * @param string $directory
     * @return void
     */
    public function setJsonDirectory(string $directory): void
    {
        $this->jsonDirectory = $directory;
    }
>>>>>>> be08416 (.)
}
