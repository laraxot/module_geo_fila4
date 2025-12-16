<?php

declare(strict_types=1);

namespace Modules\Geo\Enums;

/**
 * Enum per i tipi di indirizzi.
 */
enum AddressTypeEnum: string
{
    case HOME = 'home';
    case WORK = 'work';
    case BILLING = 'billing';
    case SHIPPING = 'shipping';
    case LEGAL = 'legal';
    case OTHER = 'other';
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)

    /**
     * Get the label for the enum value.
<<<<<<< HEAD
=======
     * <<<<<<< HEAD
     * =======.
     *
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    
    /**
     * Get the label for the enum value.
     * 
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

    /**
     * Get the label for the enum value.
     *
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
     * @return string
     *                >>>>>>> be08416 (.)
>>>>>>> c24a803 (.)
     */
    public function label(): string
    {
<<<<<<< HEAD
        return match ($this) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return match ($this) {
=======
        return match($this) {
>>>>>>> a12f125f4a (.)
=======
        return match ($this) {
>>>>>>> b93ef594b4 (.)
=======
        return match($this) {
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
            self::HOME => 'Casa',
            self::WORK => 'Lavoro',
            self::BILLING => 'Fatturazione',
            self::SHIPPING => 'Spedizione',
            self::LEGAL => 'Sede legale',
            self::OTHER => 'Altro',
        };
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)

    /**
     * Get all the options as key-value pairs.
     *
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    
    /**
     * Get all the options as key-value pairs.
     * 
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

    /**
     * Get all the options as key-value pairs.
     *
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
     * @return array<string, string>
     */
    public static function options(): array
    {
        return [
            self::HOME->value => self::HOME->label(),
            self::WORK->value => self::WORK->label(),
            self::BILLING->value => self::BILLING->label(),
            self::SHIPPING->value => self::SHIPPING->label(),
            self::LEGAL->value => self::LEGAL->label(),
            self::OTHER->value => self::OTHER->label(),
        ];
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a12f125f4a (.)
=======
}
>>>>>>> b93ef594b4 (.)
=======
}
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
