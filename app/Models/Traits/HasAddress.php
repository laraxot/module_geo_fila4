<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
=======
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
>>>>>>> be08416 (.)
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Geo\Models\Address;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * Trait HasAddress.
=======
 * Trait HasAddress
>>>>>>> be08416 (.)
 *
 * Fornisce funzionalità per la gestione degli indirizzi nei modelli Eloquent.
 * Questo trait implementa la relazione polimorfica con il modello Address
 * e offre metodi di utilità per la gestione degli indirizzi.
 *
<<<<<<< HEAD
 * @property Collection<int, Address> $addresses
=======
 * @property-read Collection<int, Address> $addresses
>>>>>>> be08416 (.)
 */
trait HasAddress
{
    /**
     * Ottiene gli indirizzi associati al modello.
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
     * Ottiene indirizzo associato al modello.
<<<<<<< HEAD
=======
     *
     * @return MorphOne
>>>>>>> be08416 (.)
     */
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'model');
    }

    /**
     * Ottiene l'indirizzo principale del modello.
<<<<<<< HEAD
     */
    public function primaryAddress(): ?Address
    {
        $res = $this->addresses()->where('is_primary', true)->first();
        if (null === $res) {
            return $res;
        }
        Assert::isInstanceOf($res, Address::class);

=======
     *
     * @return Address|null
     */
    public function primaryAddress(): null|Address
    {
        $res = $this->addresses()->where('is_primary', true)->first();
        if ($res === null) {
            return $res;
        }
        Assert::isInstanceOf($res, Address::class);
>>>>>>> be08416 (.)
        return $res;
    }

    /**
     * Ottiene l'indirizzo completo formattato.
<<<<<<< HEAD
     */
    public function getFullAddress(): ?string
    {
        $address = $this->primaryAddress();

        return $address ? $address->getFullAddress() : null;
    }

    public function getFullAddressAttribute(?string $value): ?string
=======
     *
     * @return string|null
     */
    public function getFullAddress(): null|string
    {
        $address = $this->primaryAddress();
        return $address ? $address->getFullAddress() : null;
    }

    public function getFullAddressAttribute(null|string $value): null|string
>>>>>>> be08416 (.)
    {
        if ($value) {
            return $value;
        }
        $address = $this->address()->first();
<<<<<<< HEAD
        if (null === $address) {
=======
        if ($address === null) {
>>>>>>> be08416 (.)
            return null;
        }
        Assert::isInstanceOf($address, Address::class);

        $locality = $address->getLocality();
<<<<<<< HEAD
        if (null === $locality) {
            return null;
        }

        return $address->street_address.
            ', '.
            $address->street_number.
            ' - '.
            $address->postal_code.
            ' '.
            $locality['nome'].
            ' ('.
            $locality['provincia']['nome'].
            ') ';
=======
        if ($locality === null) {
            return null;
        }

        return (
            $address->street_address .
            ', ' .
            $address->street_number .
            ' - ' .
            $address->postal_code .
            ' ' .
            $locality['nome'] .
            ' (' .
            $locality['provincia']['nome'] .
            ') '
        );
>>>>>>> be08416 (.)
    }

    /**
     * Ottiene la località dell'indirizzo principale.
<<<<<<< HEAD
     */
    public function getCity(): ?string
    {
        $address = $this->primaryAddress();

=======
     *
     * @return string|null
     */
    public function getCity(): null|string
    {
        $address = $this->primaryAddress();
>>>>>>> be08416 (.)
        return $address ? $address->locality : null;
    }

    /**
     * Ottiene il CAP dell'indirizzo principale.
<<<<<<< HEAD
     */
    public function getPostalCode(): ?string
    {
        $address = $this->primaryAddress();

=======
     *
     * @return string|null
     */
    public function getPostalCode(): null|string
    {
        $address = $this->primaryAddress();
>>>>>>> be08416 (.)
        return $address ? $address->postal_code : null;
    }

    /**
     * Ottiene la provincia dell'indirizzo principale.
<<<<<<< HEAD
     */
    public function getProvince(): ?string
    {
        $address = $this->primaryAddress();

=======
     *
     * @return string|null
     */
    public function getProvince(): null|string
    {
        $address = $this->primaryAddress();
>>>>>>> be08416 (.)
        return $address ? $address->administrative_area_level_3 : null;
    }

    /**
     * Ottiene la regione dell'indirizzo principale.
<<<<<<< HEAD
     */
    public function getRegion(): ?string
    {
        $address = $this->primaryAddress();

=======
     *
     * @return string|null
     */
    public function getRegion(): null|string
    {
        $address = $this->primaryAddress();
>>>>>>> be08416 (.)
        return $address ? $address->administrative_area_level_2 : null;
    }

    /**
     * Ottiene il paese dell'indirizzo principale.
<<<<<<< HEAD
     */
    public function getCountry(): ?string
    {
        $address = $this->primaryAddress();

=======
     *
     * @return string|null
     */
    public function getCountry(): null|string
    {
        $address = $this->primaryAddress();
>>>>>>> be08416 (.)
        return $address ? $address->country : null;
    }

    /**
     * Imposta un indirizzo come principale e rimuove il flag da tutti gli altri.
<<<<<<< HEAD
=======
     *
     * @param Address $address
     * @return bool
>>>>>>> be08416 (.)
     */
    public function setAsPrimaryAddress(Address $address): bool
    {
        // Verifica che l'indirizzo appartenga a questo modello
<<<<<<< HEAD
        if ($address->model_id !== $this->id || $address->model_type !== static::class) {
=======
        if ($address->model_id !== $this->id || $address->model_type !== get_class($this)) {
>>>>>>> be08416 (.)
            return false;
        }

        // Rimuovi il flag is_primary da tutti gli altri indirizzi
        $this->addresses()
            ->where('id', '!=', $address->id)
            ->where('is_primary', true)
            ->update(['is_primary' => false]);

        // Imposta questo indirizzo come principale
        return $address->update(['is_primary' => true]);
    }

    /**
     * Ottiene gli indirizzi di un determinato tipo.
<<<<<<< HEAD
     */
    public function getAddressesByType(string $type): Collection
=======
     *
     * @param string $type
     * @return Collection
     */
    public function getAddressesByType(string $type)
>>>>>>> be08416 (.)
    {
        return $this->addresses()->where('type', $type)->get();
    }

    /**
     * Aggiunge un nuovo indirizzo al modello.
     *
     * @param array<string, mixed> $data
<<<<<<< HEAD
     * @param bool                 $setPrimary Se impostare questo indirizzo come principale
=======
     * @param bool $setPrimary Se impostare questo indirizzo come principale
     * @return Address
>>>>>>> be08416 (.)
     */
    public function addAddress(array $data, bool $setPrimary = false): Address
    {
        // Se è il primo indirizzo o è richiesto esplicitamente, impostalo come principale
<<<<<<< HEAD
        if ($setPrimary || 0 === $this->addresses()->count()) {
=======
        if ($setPrimary || $this->addresses()->count() === 0) {
>>>>>>> be08416 (.)
            $data['is_primary'] = true;

            // Rimuovi il flag is_primary da tutti gli altri indirizzi
            if ($this->addresses()->count() > 0) {
                $this->addresses()->update(['is_primary' => false]);
            }
        }
<<<<<<< HEAD

        /* @phpstan-ignore return.type */
=======
        /** @phpstan-ignore return.type */
>>>>>>> be08416 (.)
        return $this->addresses()->create($data);
    }

    /**
     * Aggiorna l'indirizzo principale.
     *
     * @param array<string, mixed> $data
<<<<<<< HEAD
     */
    public function updatePrimaryAddress(array $data): ?Address
    {
        $primaryAddress = $this->primaryAddress();

        if (! $primaryAddress) {
=======
     * @return Address|null
     */
    public function updatePrimaryAddress(array $data): null|Address
    {
        $primaryAddress = $this->primaryAddress();

        if (!$primaryAddress) {
>>>>>>> be08416 (.)
            return $this->addAddress($data, true);
        }

        $primaryAddress->update($data);
<<<<<<< HEAD

=======
>>>>>>> be08416 (.)
        return $primaryAddress;
    }

    /**
     * Scope per filtrare i modelli in base alla città dell'indirizzo.
<<<<<<< HEAD
     */
    public function scopeInCity(Builder $query, string $city): Builder
    {
        return $query->whereHas('addresses', function ($q) use ($city): void {
=======
     *
     * @param Builder $query
     * @param string $city
     * @return Builder
     */
    public function scopeInCity($query, string $city)
    {
        return $query->whereHas('addresses', function ($q) use ($city) {
>>>>>>> be08416 (.)
            $q->where('locality', $city);
        });
    }

    /**
     * Scope per filtrare i modelli in base alla provincia dell'indirizzo.
<<<<<<< HEAD
     */
    public function scopeInProvince(Builder $query, string $province): Builder
    {
        return $query->whereHas('addresses', function ($q) use ($province): void {
=======
     *
     * @param Builder $query
     * @param string $province
     * @return Builder
     */
    public function scopeInProvince($query, string $province)
    {
        return $query->whereHas('addresses', function ($q) use ($province) {
>>>>>>> be08416 (.)
            $q->where('administrative_area_level_3', $province);
        });
    }

    /**
     * Scope per filtrare i modelli in base alla regione dell'indirizzo.
<<<<<<< HEAD
     */
    public function scopeInRegion(Builder $query, string $region): Builder
    {
        return $query->whereHas('addresses', function ($q) use ($region): void {
=======
     *
     * @param Builder $query
     * @param string $region
     * @return Builder
     */
    public function scopeInRegion($query, string $region)
    {
        return $query->whereHas('addresses', function ($q) use ($region) {
>>>>>>> be08416 (.)
            $q->where('administrative_area_level_2', $region);
        });
    }

    /**
     * Scope per filtrare i modelli in base al CAP dell'indirizzo.
<<<<<<< HEAD
     */
    public function scopeInPostalCode(Builder $query, string $postalCode): Builder
    {
        return $query->whereHas('addresses', function ($q) use ($postalCode): void {
=======
     *
     * @param Builder $query
     * @param string $postalCode
     * @return Builder
     */
    public function scopeInPostalCode($query, string $postalCode)
    {
        return $query->whereHas('addresses', function ($q) use ($postalCode) {
>>>>>>> be08416 (.)
            $q->where('postal_code', $postalCode);
        });
    }
}
