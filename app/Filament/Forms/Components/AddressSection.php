<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Forms\Components;

<<<<<<< HEAD
use Modules\Geo\Enums\AddressItemEnum;
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;

// use Squire\Models\Country;

class AddressSection extends XotBaseSection
=======
use Filament\Schemas\Components\Section;
use Modules\Geo\Filament\Resources\AddressResource;

// use Squire\Models\Country;

class AddressSection extends Section
>>>>>>> 1bb689f (.)
{
    // protected string $view = 'filament-forms::components.group';

    protected bool $disableLiveUpdates = false;

    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
        // Passiamo una Closure a schema() per rispettare la firma di Filament\Schemas
        $this->schema(fn (): array => $this->getFormSchema());
        $this->columns(3);
    }

    /**
     * @return array<string, \Filament\Forms\Components\TextInput>
     */
    public function getFormSchema(): array
    {
        /*
        // @var array<string, \Filament\Schemas\Components\Component> $schema
        $schema = AddressResource::getFormSchema();
        unset($schema['name'], $schema['is_primary']);

        return $schema;
        */
        return AddressItemEnum::getFormSchema();
=======
        $this->columns(2);
    }

    protected function getFormSchema(): array
    {
        $res = AddressResource::getFormSchema();
        unset($res['name']);
        unset($res['is_primary']);

        return $res;
>>>>>>> 1bb689f (.)
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
