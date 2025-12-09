<?php

declare(strict_types=1);

namespace Modules\Geo\Traits;

<<<<<<< HEAD
=======
use InvalidArgumentException;
>>>>>>> be08416 (.)
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Geo\Enums\AddressTypeEnum;
use Modules\Geo\Models\Address;

/**
<<<<<<< HEAD
 * Trait HasAddresses.
=======
 * Trait HasAddresses
>>>>>>> be08416 (.)
 *
 * Questo trait fornisce funzionalità per gestire indirizzi multipli su qualsiasi modello.
 */
trait HasAddresses
{
    /**
     * Relazione a tutti gli indirizzi.
<<<<<<< HEAD
=======
     *
     * @return MorphMany
>>>>>>> be08416 (.)
     */
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'model');
    }

    /**
     * Relazione all'indirizzo principale.
<<<<<<< HEAD
=======
     *
     * @return MorphOne
>>>>>>> be08416 (.)
     */
    public function primaryAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'model')->where('is_primary', true);
    }

    /**
     * Relazione all'indirizzo di casa.
<<<<<<< HEAD
=======
     *
     * @return MorphOne
>>>>>>> be08416 (.)
     */
    public function homeAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'model')->where('type', AddressTypeEnum::HOME->value);
    }

    /**
     * Relazione all'indirizzo di lavoro.
<<<<<<< HEAD
=======
     *
     * @return MorphOne
>>>>>>> be08416 (.)
     */
    public function workAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'model')->where('type', AddressTypeEnum::WORK->value);
    }

    /**
     * Relazione all'indirizzo di fatturazione.
<<<<<<< HEAD
=======
     *
     * @return MorphOne
>>>>>>> be08416 (.)
     */
    public function billingAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'model')->where('type', AddressTypeEnum::BILLING->value);
    }

    /**
     * Relazione all'indirizzo di spedizione.
<<<<<<< HEAD
=======
     *
     * @return MorphOne
>>>>>>> be08416 (.)
     */
    public function shippingAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'model')->where('type', AddressTypeEnum::SHIPPING->value);
    }

    /**
     * Imposta un indirizzo come principale.
<<<<<<< HEAD
=======
     *
     * @param Address $address
     * @return void
>>>>>>> be08416 (.)
     */
    public function setPrimaryAddress(Address $address): void
    {
        // Assicurati che l'indirizzo appartenga a questo modello
<<<<<<< HEAD
        if ($address->model_id !== $this->id || $address->model_type !== static::class) {
            throw new \InvalidArgumentException('L\'indirizzo non appartiene a questo modello.');
=======
        if ($address->model_id !== $this->id || $address->model_type !== get_class($this)) {
            throw new InvalidArgumentException('L\'indirizzo non appartiene a questo modello.');
>>>>>>> be08416 (.)
        }

        // Rimuovi lo stato primario da tutti gli altri indirizzi
        $this->addresses()->update(['is_primary' => false]);

        // Imposta questo indirizzo come primario
        $address->is_primary = true;
        $address->save();
    }

    /**
     * Aggiunge un nuovo indirizzo.
     *
     * @param array<string, mixed> $data
<<<<<<< HEAD
=======
     * @param bool $isPrimary
     * @return Address
>>>>>>> be08416 (.)
     */
    public function addAddress(array $data, bool $isPrimary = false): Address
    {
        // Se l'indirizzo deve essere primario, rimuovi lo stato primario dagli altri
        if ($isPrimary) {
            $this->addresses()->update(['is_primary' => false]);
        }

        // Crea il nuovo indirizzo
        $data['is_primary'] = $isPrimary;
<<<<<<< HEAD

=======
>>>>>>> be08416 (.)
        return $this->addresses()->create($data);
    }

    /**
     * Ottiene gli indirizzi per tipo.
<<<<<<< HEAD
     */
    public function getAddressesByType(AddressTypeEnum|string $type): Collection
    {
        $typeValue = $type instanceof AddressTypeEnum ? $type->value : $type;

=======
     *
     * @param AddressTypeEnum|string $type
     * @return Collection
     */
    public function getAddressesByType($type)
    {
        $typeValue = ($type instanceof AddressTypeEnum) ? $type->value : $type;
>>>>>>> be08416 (.)
        return $this->addresses()->where('type', $typeValue)->get();
    }
}
