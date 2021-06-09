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
];