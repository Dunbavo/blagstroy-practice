<?php

use ZLabs\Frontend\MustacheSingleton;

$mustache = MustacheSingleton::getInstance();

return [
    'title' => 'Проекты компании',
    'sections' => collect([
        [
            'id' => 'apartments',
            'name' => 'Квартиры',
            'active' => true,
            'content' => $mustache->render('projects-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/homepage/projects-list1.php')
        ],
        [
            'id' => 'parking-spaces',
            'name' => 'Машиноместа',
            'active' => false,
            'content' => $mustache->render('projects-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/homepage/projects-list2.php')
        ],
        [
            'id' => 'commercial-real-estate',
            'name' => 'Коммерческая недвижимость',
            'active' => false,
            'content' => $mustache->render('projects-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/homepage/projects-list2.php')
        ],
    ]),
    'dropdown' => [
        'items' => [
            [
                'id' => 'apartments',
                'name' => 'Квартиры',
            ],
            [
                'id' => 'parking-spaces',
                'name' => 'Машиноместа',
            ],
            [
                'id' => 'commercial-real-estate',
                'name' => 'Коммерческая недвижимость',
            ],
            [
                'id' => 'commercial-real-estate',
                'name' => 'Коммерческая недвижимость',
            ],
            [
                'id' => 'commercial-real-estate',
                'name' => 'Коммерческая недвижимость',
            ],
            [
                'id' => 'commercial-real-estate',
                'name' => 'Коммерческая недвижимость',
            ],
        ]
    ]
];