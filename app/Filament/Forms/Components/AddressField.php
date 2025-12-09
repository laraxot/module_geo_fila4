<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Forms\Components;

use Filament\Schemas\Components\Section;
<<<<<<< HEAD
use Modules\Geo\Filament\Resources\AddressResource;
=======
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Modules\Geo\Filament\Resources\AddressResource;
use Webmozart\Assert\Assert;
>>>>>>> be08416 (.)

// use Squire\Models\Country;

class AddressField extends Section
{
<<<<<<< HEAD
    // protected string $view = 'filament-forms::components.group';
=======
    //protected string $view = 'filament-forms::components.group';
>>>>>>> be08416 (.)

    protected bool $disableLiveUpdates = false;

    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
        /* @phpstan-ignore argument.type */
=======
>>>>>>> be08416 (.)
        $this->schema($this->getAddressFormSchema());
        $this->columns(2);
    }

    /**
<<<<<<< HEAD
     * Disabilita gli aggiornamenti live per evitare loop infiniti nei wizard di creazione.
=======
     * Disabilita gli aggiornamenti live per evitare loop infiniti nei wizard di creazione
>>>>>>> be08416 (.)
     */
    public function disableLiveUpdates(bool $disable = true): static
    {
        $this->disableLiveUpdates = $disable;
<<<<<<< HEAD

=======
>>>>>>> be08416 (.)
        return $this;
    }

    protected function getAddressFormSchema(): array
    {
        $baseSchema = AddressResource::getFormSchema();

        // Rimuovi campi non necessari per relazioni semplici
<<<<<<< HEAD
        unset($baseSchema['name'], $baseSchema['is_primary']);
=======
        unset($baseSchema['name']);
        unset($baseSchema['is_primary']);
>>>>>>> be08416 (.)

        // Se i live updates sono disabilitati, rimuovi la reattività
        if ($this->disableLiveUpdates) {
            $baseSchema = $this->removeReactivityFromSchema($baseSchema);
        }

        return $baseSchema;
    }

    /**
<<<<<<< HEAD
     * Rimuove tutti i pattern reattivi dai campi per prevenire loop infiniti.
     *
     * @param array<string, mixed> $schema
     *
=======
     * Rimuove tutti i pattern reattivi dai campi per prevenire loop infiniti
     *
     * @param array<string, mixed> $schema
>>>>>>> be08416 (.)
     * @return array<string, mixed>
     */
    protected function removeReactivityFromSchema(array $schema): array
    {
        foreach ($schema as $key => $field) {
<<<<<<< HEAD
            /* @phpstan-ignore argument.type */
            if (method_exists($field, 'live')) {
                // Rimuovi reattività live
                /* @phpstan-ignore method.nonObject */
                $field->live(false);
            }

            /* @phpstan-ignore argument.type */
            if (method_exists($field, 'afterStateUpdated')) {
                // Rimuovi callback afterStateUpdated
                /* @phpstan-ignore method.nonObject */
                $field->afterStateUpdated(null);
            }

            /* @phpstan-ignore argument.type */
            if (method_exists($field, 'disabled')) {
                // Rimuovi condizioni disabled dinamiche
                /* @phpstan-ignore method.nonObject */
=======
            /** @phpstan-ignore argument.type */
            if (method_exists($field, 'live')) {
                // Rimuovi reattività live
                /** @phpstan-ignore method.nonObject */
                $field->live(false);
            }

            /** @phpstan-ignore argument.type */
            if (method_exists($field, 'afterStateUpdated')) {
                // Rimuovi callback afterStateUpdated
                /** @phpstan-ignore method.nonObject */
                $field->afterStateUpdated(null);
            }

            /** @phpstan-ignore argument.type */
            if (method_exists($field, 'disabled')) {
                // Rimuovi condizioni disabled dinamiche
                /** @phpstan-ignore method.nonObject */
>>>>>>> be08416 (.)
                $field->disabled(false);
            }

            $schema[$key] = $field;
        }

        return $schema;
    }

    /*
     * public function saveRelationships(): void
     * {
     *
     * $state = $this->getState();
     * $record = $this->getRecord();
     * $relationship = $record->{$this->getRelationship()}();
     *
     * if (null === $relationship) {
     * return;
     * }
     * if ($address = $relationship->first()) {
     * $address->update($state);
     * } else {
     * $relationship->updateOrCreate($state);
     * }
     *
     * $record->touch();
     * }
     */
}
