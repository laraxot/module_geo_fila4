<?php

declare(strict_types=1);

namespace Modules\Geo\Enums;

/**
 * <<<<<<< HEAD
 * Enum per i tipi di indirizzi.
 * =======
 * Enum per i tipi di indirizzi
 * >>>>>>> be08416 (.).
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
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)

    /**
     * Get the label for the enum value.
     * <<<<<<< HEAD
     * =======.
     *
<<<<<<< HEAD
=======
    
    /**
     * Get the label for the enum value.
     * 
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
     * @return string
     *                >>>>>>> be08416 (.)
     */
    public function label(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return match ($this) {
=======
        return match($this) {
>>>>>>> bc26394 (.)
=======
        return match ($this) {
>>>>>>> c942565 (.)
            self::HOME => 'Casa',
            self::WORK => 'Lavoro',
            self::BILLING => 'Fatturazione',
            self::SHIPPING => 'Spedizione',
            self::LEGAL => 'Sede legale',
            self::OTHER => 'Altro',
        };
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)

    /**
     * Get all the options as key-value pairs.
     *
<<<<<<< HEAD
=======
    
    /**
     * Get all the options as key-value pairs.
     * 
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
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
<<<<<<< HEAD
}
=======
}
>>>>>>> bc26394 (.)
=======
}
>>>>>>> c942565 (.)
