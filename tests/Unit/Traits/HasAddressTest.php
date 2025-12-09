<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Geo\Tests\Unit\Traits;

use Modules\Geo\Models\BaseModel;
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> be08416 (.)
use Modules\Geo\Models\Traits\HasAddress;
use Tests\TestCase;

uses(TestCase::class);

/**
 * Modello di test per il trait HasAddress.
 */
<<<<<<< HEAD
class HasAddressTest extends BaseModel
=======
class TestModel extends Model
>>>>>>> be08416 (.)
{
    use HasAddress;

    protected $fillable = ['name'];

    public $timestamps = false;

    protected $table = 'test_models';

    /**
<<<<<<< HEAD
     * Override connection for testing - use default connection.
     */
    protected $connection;

    /**
=======
>>>>>>> be08416 (.)
     * Bootstrap this model.
     */
    public static function boot()
    {
        parent::boot();

<<<<<<< HEAD
        static::creating(static function () {
            if (! app()->environment('testing')) {
=======
        static::creating(function () {
            if (!app()->environment('testing')) {
>>>>>>> be08416 (.)
                throw new Exception('TestModel should only be used in tests.');
            }
        });
    }
}

beforeEach(function () {
    // Crea un modello di test
<<<<<<< HEAD
    $this->model = new HasAddressTest();
    $this->model->name = 'Test Model';
    $this->model->save();
=======
    $this->model = TestModel::create([
        'name' => 'Test Model',
    ]);
>>>>>>> be08416 (.)
});

it('can have multiple addresses', function () {
    // Aggiungi due indirizzi al modello
    $this->model
        ->addresses()
        ->create([
            'route' => 'Via Roma',
            'street_number' => '123',
            'locality' => 'Milano',
            'postal_code' => '20100',
            'is_primary' => true,
        ]);

    $this->model
        ->addresses()
        ->create([
            'route' => 'Via Garibaldi',
            'street_number' => '456',
            'locality' => 'Roma',
            'postal_code' => '00100',
            'is_primary' => false,
        ]);

    // Verifica che il modello abbia due indirizzi
    expect($this->model->addresses)->toHaveCount(2);
});

it('can get primary address', function () {
    // Aggiungi un indirizzo principale
    $this->model
        ->addresses()
        ->create([
            'route' => 'Via Roma',
            'street_number' => '123',
            'locality' => 'Milano',
            'postal_code' => '20100',
            'is_primary' => true,
        ]);

    // Aggiungi un indirizzo secondario
    $this->model
        ->addresses()
        ->create([
            'route' => 'Via Garibaldi',
            'street_number' => '456',
            'locality' => 'Roma',
            'postal_code' => '00100',
            'is_primary' => false,
        ]);

    // Verifica che il metodo primaryAddress restituisca l'indirizzo principale
    $primaryAddress = $this->model->primaryAddress();

    expect($primaryAddress)->not->toBeNull();
    expect($primaryAddress->route)->toBe('Via Roma');
});

it('can set primary address', function () {
    // Aggiungi due indirizzi
    $address1 = $this->model
        ->addresses()
        ->create([
            'route' => 'Via Roma',
            'street_number' => '123',
            'locality' => 'Milano',
            'postal_code' => '20100',
            'is_primary' => true,
        ]);

    $address2 = $this->model
        ->addresses()
        ->create([
            'route' => 'Via Garibaldi',
            'street_number' => '456',
            'locality' => 'Roma',
            'postal_code' => '00100',
            'is_primary' => false,
        ]);

    // Imposta il secondo indirizzo come principale
    $this->model->setAsPrimaryAddress($address2);

    // Ricarica gli indirizzi dal database
    $address1->refresh();
    $address2->refresh();

    // Verifica che il primo indirizzo non sia più principale
    expect($address1->is_primary)->toBeFalse();

    // Verifica che il secondo indirizzo sia ora principale
    expect($address2->is_primary)->toBeTrue();
});

it('can get formatted address', function () {
    // Aggiungi un indirizzo principale
    $this->model
        ->addresses()
        ->create([
            'route' => 'Via Roma',
            'street_number' => '123',
            'locality' => 'Milano',
            'postal_code' => '20100',
            'is_primary' => true,
        ]);

    // Verifica che il metodo getFullAddress restituisca l'indirizzo formattato
    $fullAddress = $this->model->getFullAddress();

    expect($fullAddress)->not->toBeNull();
    expect($fullAddress)->toContain('Via Roma');
    expect($fullAddress)->toContain('Milano');
});

<<<<<<< HEAD
it('can filter models by city', static function () {
    // Crea due modelli con indirizzi in città diverse
    $model1 = new HasAddressTest();
    $model1->name = 'Model 1';
    $model1->save();

=======
it('can filter models by city', function () {
    // Crea due modelli con indirizzi in città diverse
    $model1 = TestModel::create(['name' => 'Model 1']);
>>>>>>> be08416 (.)
    $model1
        ->addresses()
        ->create([
            'route' => 'Via Roma',
            'street_number' => '123',
            'locality' => 'Milano',
            'postal_code' => '20100',
        ]);

<<<<<<< HEAD
    $model2 = new HasAddressTest();
    $model2->name = 'Model 2';
    $model2->save();

=======
    $model2 = TestModel::create(['name' => 'Model 2']);
>>>>>>> be08416 (.)
    $model2
        ->addresses()
        ->create([
            'route' => 'Via Garibaldi',
            'street_number' => '456',
            'locality' => 'Roma',
            'postal_code' => '00100',
        ]);

    // Filtra i modelli per città
<<<<<<< HEAD
    $modelsInMilano = HasAddressTest::inCity('Milano')->get();
    $modelsInRoma = HasAddressTest::inCity('Roma')->get();
=======
    $modelsInMilano = TestModel::inCity('Milano')->get();
    $modelsInRoma = TestModel::inCity('Roma')->get();
>>>>>>> be08416 (.)

    // Verifica che il filtro funzioni correttamente
    expect($modelsInMilano)->toHaveCount(1);
    expect($modelsInMilano->first()->name)->toBe('Model 1');

    expect($modelsInRoma)->toHaveCount(1);
    expect($modelsInRoma->first()->name)->toBe('Model 2');
});
