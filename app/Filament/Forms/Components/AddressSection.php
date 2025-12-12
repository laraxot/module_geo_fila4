<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Forms\Components;

use Filament\Schemas\Components\Section;
use Modules\Geo\Filament\Resources\AddressResource;

// use Squire\Models\Country;

class AddressSection extends Section
{
    // protected string $view = 'filament-forms::components.group';

    protected bool $disableLiveUpdates = false;

    protected function setUp(): void
    {
        parent::setUp();
        // Passiamo una Closure a schema() per rispettare la firma di Filament\Schemas
        $this->schema(fn (): array => $this->getFormSchema());
        $this->columns(2);
    }

    /**
     * Restituisce lo schema del form per la sezione indirizzo.
     *
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    protected function getFormSchema(): array
    {
        /** @var array<string, \Filament\Schemas\Components\Component> $schema */
        $schema = AddressResource::getFormSchema();
        unset($schema['name'], $schema['is_primary']);

        return $schema;
    }

    /*
    public function saveRelationships(): void
    {

        $state = $this->getState();
        $record = $this->getRecord();
        $relationship = $record->{$this->getRelationship()}();

        if (null === $relationship) {
            return;
        }
        if ($address = $relationship->first()) {
            $address->update($state);
        } else {
            $relationship->updateOrCreate($state);
        }

        $record->touch();
    }
    */
}
