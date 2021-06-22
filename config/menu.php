<?php

return [

    'Tableau de bord' => [
        'route'  => 'admin',
        'icon'   => 'tachometer-alt',
    ],
    'Utilisateurs' => [
        'icon'   => 'address-book',
        'children' => [
            [
                'name'  => 'Etudiants',
                'route' => 'usersEt.index',
            ],
            [
                'name'  => 'Enseignants',
                'route' => 'usersEn.index',
            ],
            [
                'name'  => 'Techniciens',
                'route' => 'usersTe.index',
            ],
        ],
    ],

    'Class' => [
        'icon'   => 'glasses',
        'children' => [
            [
                'name'  => 'List Etudiants',
                'route' => 'Liste-etudiants.index',
            ],
            [
                'name'  => 'List Class',
                'route' => 'Liste-class.index',
            ],

        ],
    ],



    'Publication' => [
        'icon'   => 'calendar-week',
        'children' => [
            [
                'name'  => 'Publications',
                'route' => 'publication.index',
            ],
            [
                'name'  => 'Ajouter Publication',
                'route' => 'publication.create',
            ],
            [
                'name'  => 'Les inscrits',
                'route' => 'Inscriptions-list.index',
            ],
        ],
    ],

    'fiche de vœux' => [
        'icon'   => 'file-alt',
        'children' => [
            [
                'name'  => 'Ouverture/Fermeture',
                'route'  => 'Fiche-De-Vœux.index',
            ],
            [
                'name'  => 'List matières',
                'route' => 'Listmatières.index',
            ],
            [
                'name'  => 'List des fiche de vœux',
                'route' => 'Fiche-De-Vœux.résultats',
            ],

        ],
    ],

    'Formation' => [
        'icon'   => 'fas fa-atlas',
        'route' => 'ColloqueScientifiques.index',

    ],

    'Rattrapage' => [
        'icon'   => 'sticky-note',
        'route' => 'rattrapages.index',

    ],

    'Contact' => [
        'icon'   => 'comment-alt',
        'route' => 'Contact.index',

    ],

    'Tableau d\'Affichage' => [
        'icon'   => 'calendar-alt',
        'children' => [
            [
                'name'  => 'Emploi du temps',
                'route' => 'Emploi.index',
            ],
            [
                'name'  => 'Tableau d\'Affichage',
                'route' => 'TableauAffichage-Admin.index',
            ],
            [
                'name'  => 'new Tableau d\'Affichage',
                'route' => 'TableauAffichage-Admin.create',
            ],

        ],
    ],


];
