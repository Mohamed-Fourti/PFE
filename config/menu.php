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
    'Evenement' => [
        'icon'   => 'calendar-week',
        'children' => [
            [
                'name'  => 'Ajouter Evenement',
                'route' => 'event.create',
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


];