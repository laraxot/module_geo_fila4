<?php

declare(strict_types=1);

<<<<<<< HEAD
=======

>>>>>>> be08416 (.)
return [
    'navigation' => [
        'label' => 'Tabella Posizioni',
        'group' => 'Gestione Territorio',
<<<<<<< HEAD
        'icon' => 'ui-geo-location',
=======
        'icon' => 'geo-location',
>>>>>>> be08416 (.)
        'sort' => '15',
    ],
    'table' => [
        'columns' => [
            'name' => 'Nome',
            'address' => 'Indirizzo',
            'coordinates' => 'Coordinate',
            'actions' => 'Azioni',
        ],
        'filters' => [
            'with_coordinates' => 'Con coordinate',
            'without_coordinates' => 'Senza coordinate',
        ],
    ],
    'actions' => [
        'view_on_map' => 'Visualizza sulla mappa',
        'edit_coordinates' => 'Modifica coordinate',
        'export' => 'Esporta dati',
    ],
];
