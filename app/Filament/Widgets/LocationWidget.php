<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Widgets;

use Filament\Schemas\Components\Component;
<<<<<<< HEAD
=======
use Override;
>>>>>>> be08416 (.)
use Modules\Geo\Filament\Forms\LocationForm;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Widget per la selezione della località.
 *
 * Questo widget fornisce un form per la selezione della località utilizzando
 * il form LocationForm.
 *
 * @see \Modules\Geo\docs\json-database.md
 */
class LocationWidget extends XotBaseWidget
{
    /**
<<<<<<< HEAD
     * Dati del widget.
     */
    public ?array $data = [];

    /**
     * Titolo del widget.
     */
    public string $title = 'geo::widgets.location.title';

    /**
     * Icona del widget.
     */
    public string $icon = 'heroicon-o-map-pin';

    /**
     * Ordine di visualizzazione del widget.
     */
    protected static ?int $sort = 1;
=======
     * Ordine di visualizzazione del widget.
     */
    protected static null|int $sort = 1;
>>>>>>> be08416 (.)

    /**
     * Numero di colonne occupate dal widget.
     */
    protected int|string|array $columnSpan = 'full';

    /**
<<<<<<< HEAD
=======
     * Dati del widget.
     */
    public null|array $data = [];

    /**
     * Titolo del widget.
     */
    public string $title = 'geo::widgets.location.title';

    /**
>>>>>>> be08416 (.)
     * Vista del widget.
     */
    protected string $view = 'geo::filament.widgets.location';

    /**
<<<<<<< HEAD
=======
     * Icona del widget.
     */
    public string $icon = 'heroicon-o-map-pin';

    /**
>>>>>>> be08416 (.)
     * Form per la selezione della località.
     */
    private LocationForm $locationForm;

    /**
     * Costruttore.
     */
    public function __construct()
    {
        $this->locationForm = new LocationForm;
    }

    /**
     * Inizializza il widget.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> be08416 (.)
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Ottiene lo schema del form.
     *
     * @return array<int, Component>
     */
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> be08416 (.)
    public function getFormSchema(): array
    {
        return $this->locationForm->getSchema();
    }

    /**
     * Gestisce l'invio del form.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> be08416 (.)
     */
    public function submit(): void
    {
        $data = $this->form->getState();

        $this->dispatch('location-selected', $data);

        // Utilizzo metodo Livewire per notifiche
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => __('geo::widgets.location.messages.success'),
        ]);
    }

    /**
     * Verifica se il widget può essere visualizzato.
<<<<<<< HEAD
=======
     *
     * @return bool
>>>>>>> be08416 (.)
     */
    public static function canView(): bool
    {
        return true;
    }
}
