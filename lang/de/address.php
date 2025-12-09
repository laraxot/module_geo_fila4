<?php

declare(strict_types=1);

return [
    'singular' => 'Adresse',
    'plural' => 'Adressen',
    'navigation' => [
        'sort' => 96,
        'icon' => 'heroicon-o-map-pin',
        'group' => 'Geo',
<<<<<<< HEAD
        'label' => 'Adresse',
=======
>>>>>>> be08416 (.)
    ],
    'actions' => [
        'create' => 'Adresse erstellen',
        'edit' => 'Adresse bearbeiten',
<<<<<<< HEAD
        'view' => 'Adresse ansehen',
        'delete' => 'Adresse löschen',
        'set_primary' => 'Als primär festlegen',
        'verify' => 'Adresse überprüfen',
        'geocode' => 'Geocodierung',
=======
        'view' => 'Adresse anzeigen',
        'delete' => 'Adresse löschen',
        'set_primary' => 'Als primär festlegen',
        'verify' => 'Adresse verifizieren',
        'geocode' => 'Geocodieren',
>>>>>>> be08416 (.)
    ],
    'fields' => [
        'model_type' => [
            'label' => 'Modelltyp',
            'placeholder' => 'Modelltyp auswählen',
<<<<<<< HEAD
            'help' => 'Mit der Adresse verknüpfter Modelltyp',
=======
            'help' => 'Typ des mit der Adresse verknüpften Modells',
>>>>>>> be08416 (.)
            'description' => 'Typ des Modells, das diese Adresse besitzt',
            'helper_text' => '',
        ],
        'model_id' => [
            'label' => 'Modell-ID',
            'placeholder' => 'Modell-ID eingeben',
<<<<<<< HEAD
            'help' => 'Kennung des verknüpften Modells',
=======
            'help' => 'Bezeichner des verknüpften Modells',
>>>>>>> be08416 (.)
            'description' => 'ID des Modells, das diese Adresse besitzt',
            'helper_text' => '',
        ],
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Namen für die Adresse eingeben',
<<<<<<< HEAD
            'help' => 'Ein identifizierender Name für diese Adresse, z.B. "Zuhause" oder "Büro"',
            'helper_text' => '',
            'description' => 'Identifizierender Adressname',
=======
            'help' => 'Ein beschreibender Name für diese Adresse, z.B. "Zuhause" oder "Büro"',
            'helper_text' => '',
            'description' => 'Identifizierender Name der Adresse',
>>>>>>> be08416 (.)
        ],
        'description' => [
            'label' => 'Beschreibung',
            'placeholder' => 'Beschreibung eingeben',
<<<<<<< HEAD
            'help' => 'Zusätzliche Hinweise zur Adresse',
            'description' => 'Zusätzliche Adressbeschreibung',
            'helper_text' => '',
        ],
        'street' => [
            'label' => 'Straße',
            'placeholder' => 'Straßenadresse eingeben',
            'help' => 'Straßenadresse mit Hausnummer',
            'description' => 'Straßenadresse',
            'helper_text' => '',
        ],
        'city' => [
            'label' => 'Stadt',
            'placeholder' => 'Stadt eingeben',
            'help' => 'Stadtname',
            'description' => 'Stadtname',
            'helper_text' => '',
        ],
        'state' => [
            'label' => 'Bundesland/Provinz',
            'placeholder' => 'Bundesland oder Provinz eingeben',
            'help' => 'Bundesland oder Provinz',
            'description' => 'Bundesland oder Provinz',
            'helper_text' => '',
        ],
        'postal_code' => [
            'label' => 'Postleitzahl',
            'placeholder' => 'Postleitzahl eingeben',
            'help' => 'PLZ oder Postleitzahl',
            'description' => 'Postleitzahl',
=======
            'help' => 'Zusätzliche Notizen zur Adresse',
            'description' => 'Zusätzliche Beschreibung der Adresse',
            'helper_text' => '',
        ],
        'route' => [
            'label' => 'Straße',
            'placeholder' => 'Straße eingeben',
            'help' => 'Name der Straße oder des Weges',
            'description' => 'Name der Straße oder des Weges',
            'helper_text' => '',
        ],
        'street_number' => [
            'label' => 'Hausnummer',
            'placeholder' => 'Hausnummer eingeben',
            'help' => 'Hausnummer des Gebäudes',
            'description' => 'Hausnummer des Gebäudes',
            'helper_text' => '',
        ],
        'locality' => [
            'label' => 'Stadt',
            'placeholder' => 'Stadt eingeben',
            'help' => 'Name der Stadt oder des Ortes',
            'description' => 'Name der Stadt oder des Ortes',
            'helper_text' => '',
        ],
        'administrative_area_level_3' => [
            'label' => 'Gemeinde',
            'placeholder' => 'Gemeinde eingeben',
            'help' => 'Zugehörige Gemeinde',
            'description' => 'Zugehörige Gemeinde',
            'helper_text' => '',
        ],
        'administrative_area_level_2' => [
            'label' => 'Provinz',
            'placeholder' => 'Provinz eingeben',
            'help' => 'Zugehörige Provinz',
            'description' => 'Zugehörige Provinz',
            'helper_text' => '',
        ],
        'administrative_area_level_1' => [
            'label' => 'Region',
            'placeholder' => 'Region eingeben',
            'help' => 'Verwaltungsregion',
            'description' => 'Zugehörige Region',
>>>>>>> be08416 (.)
            'helper_text' => '',
        ],
        'country' => [
            'label' => 'Land',
            'placeholder' => 'Land eingeben',
<<<<<<< HEAD
            'help' => 'Ländername',
            'description' => 'Ländername',
=======
            'help' => 'Zugehöriges Land',
            'description' => 'Zugehöriges Land',
            'helper_text' => '',
        ],
        'postal_code' => [
            'label' => 'PLZ',
            'placeholder' => 'PLZ eingeben',
            'help' => 'Postleitzahl',
            'description' => 'Postleitzahl',
            'helper_text' => '',
        ],
        'formatted_address' => [
            'label' => 'Formatierte Adresse',
            'placeholder' => 'Vollständige formatierte Adresse',
            'help' => 'Vollständige formatierte Adresse',
            'description' => 'Vollständige formatierte Adresse',
            'helper_text' => '',
        ],
        'place_id' => [
            'label' => 'Ort-ID',
            'placeholder' => 'Google Maps Referenz-ID',
            'help' => 'Google Maps Bezeichner für den Ort',
            'description' => 'Google Maps Bezeichner für den Ort',
>>>>>>> be08416 (.)
            'helper_text' => '',
        ],
        'latitude' => [
            'label' => 'Breitengrad',
            'placeholder' => 'Breitengrad eingeben',
<<<<<<< HEAD
            'help' => 'Geografische Breitengrad-Koordinate',
            'description' => 'Breitengrad-Koordinate',
=======
            'help' => 'Geografische Breitengrad-Koordinaten',
            'description' => 'Geografische Breitengrad-Koordinaten',
>>>>>>> be08416 (.)
            'helper_text' => '',
        ],
        'longitude' => [
            'label' => 'Längengrad',
            'placeholder' => 'Längengrad eingeben',
<<<<<<< HEAD
            'help' => 'Geografische Längengrad-Koordinate',
            'description' => 'Längengrad-Koordinate',
            'helper_text' => '',
        ],
        'is_primary' => [
            'label' => 'Primäre Adresse',
            'help' => 'Als primäre Adresse markieren',
            'description' => 'Ob dies die primäre Adresse ist',
            'helper_text' => '',
        ],
        'is_verified' => [
            'label' => 'Verifizierte Adresse',
            'help' => 'Adresse wurde überprüft',
            'description' => 'Ob diese Adresse überprüft wurde',
            'helper_text' => '',
        ],
    ],
=======
            'help' => 'Geografische Längengrad-Koordinaten',
            'description' => 'Geografische Längengrad-Koordinaten',
            'helper_text' => '',
        ],
        'type' => [
            'label' => 'Typ',
            'placeholder' => 'Adresstyp auswählen',
            'help' => 'Typ der Adresse (Zuhause, Arbeit, etc.)',
            'description' => 'Typ der Adresse',
            'helper_text' => '',
            'options' => [
                'billing' => 'Rechnung',
                'shipping' => 'Versand',
                'home' => 'Zuhause',
                'work' => 'Arbeit',
                'other' => 'Andere',
            ],
        ],
        'is_primary' => [
            'label' => 'Primär',
            'help' => 'Diese Adresse als primäre Adresse festlegen',
            'description' => 'Primäre Adresse',
            'helper_text' => '',
            'placeholder' => 'Als primär festlegen',
        ],
        'extra_data' => [
            'label' => 'Zusätzliche Daten',
            'placeholder' => 'Zusätzliche Daten eingeben',
            'help' => 'Zusätzliche Informationen zur Adresse',
            'description' => 'Zusätzliche Daten der Adresse',
            'helper_text' => '',
        ],
        'full_address' => [
            'label' => 'Vollständige Adresse',
            'placeholder' => '',
            'help' => 'Vollständige formatierte Adresse',
            'description' => 'Vollständige formatierte Adresse',
            'helper_text' => '',
        ],
        'street_address' => [
            'label' => 'Straßenadresse',
            'placeholder' => '',
            'help' => 'Vollständige Straßenadresse',
            'description' => 'Vollständige Straßenadresse',
            'helper_text' => '',
        ],
        'map' => [
            'label' => 'Karte',
            'placeholder' => '',
            'help' => 'Kartenansicht',
            'description' => 'Kartenansicht',
            'helper_text' => '',
        ],
    ],
    'columns' => [
        'name' => 'Name',
        'full_address' => 'Vollständige Adresse',
        'type' => 'Typ',
        'is_primary' => 'Primär',
        'locality' => 'Stadt',
        'postal_code' => 'PLZ',
        'model' => 'Zugeordnet zu',
    ],
    'messages' => [
        'primary_set' => 'Adresse erfolgreich als primär festgelegt',
        'address_verified' => 'Adresse erfolgreich verifiziert',
        'geocoding_success' => 'Geocodierung erfolgreich abgeschlossen',
        'geocoding_failed' => 'Adresse konnte nicht geocodiert werden',
    ],
    'sections' => [
        'location' => [
            'label' => 'Standortinformationen',
            'description' => 'Daten zur geografischen Position',
        ],
        'address' => [
            'label' => 'Adressdaten',
            'description' => 'Details der Adresse',
        ],
        'metadata' => [
            'label' => 'Metadaten',
            'description' => 'Zusätzliche Informationen zur Adresse',
        ],
        'map' => [
            'label' => 'Karte',
            'description' => 'Kartenansicht',
        ],
    ],
>>>>>>> be08416 (.)
];
