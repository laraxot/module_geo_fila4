<?php

declare(strict_types=1);

namespace Modules\Geo\Contracts;

/**
 * Interfaccia per modelli che supportano la geolocalizzazione.
 */
interface HasGeolocation
{
    /**
     * Ottiene la latitudine.
     */
<<<<<<< HEAD
    public function getLatitude(): ?float;
=======
    public function getLatitude(): null|float;
>>>>>>> be08416 (.)

    /**
     * Ottiene la longitudine.
     */
<<<<<<< HEAD
    public function getLongitude(): ?float;
=======
    public function getLongitude(): null|float;
>>>>>>> be08416 (.)

    /**
     * Ottiene l'indirizzo formattato.
     */
<<<<<<< HEAD
    public function getFormattedAddress(): ?string;
=======
    public function getFormattedAddress(): null|string;
>>>>>>> be08416 (.)

    /**
     * Verifica se le coordinate sono valide.
     */
    public function hasValidCoordinates(): bool;

    /**
     * Ottiene il tipo di luogo.
     */
<<<<<<< HEAD
    public function getLocationType(): ?string;
=======
    public function getLocationType(): null|string;
>>>>>>> be08416 (.)

    /**
     * Ottiene l'icona per la mappa.
     */
<<<<<<< HEAD
    public function getMapIcon(): ?string;
=======
    public function getMapIcon(): null|string;
>>>>>>> be08416 (.)
}
