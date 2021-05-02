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

];