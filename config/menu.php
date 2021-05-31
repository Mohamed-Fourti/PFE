<?php

return [

    'Dashboard' => [
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
        'route' => 'class.index',

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
                'name'  => 'Linscriptions',
                'route' => 'Inscriptions-list.index',
            ],
        ],
    ],

    'Categories' => [
        'icon' => 'list',
        'children' => [
            [
                'name'  => 'All categories',
                'route' => 'categories.index',
            ],
            [
                'name'  => 'Add',
                'route' => 'categories.create',
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
                'name'  => 'Result',
                'route' => 'categories.create',
            ],
        ],
    ],
];