<?php

use ZLabs\BxMustache\AdaptiveImage;
use ZLabs\Frontend\MustacheSingleton;

$mustache = MustacheSingleton::getInstance();

$image1 = new AdaptiveImage();
$image1->alt = 'Многоквартирный дом, Литер 5';
$image1->mdSrc = '/local/assets/images/temp/projects-list/image-project-1-mobile.jpg';
$image1->src = '/local/assets/images/temp/projects-list/image-project-1-tablet.jpg';

return [
    'title' => 'Проекты компании',
    'tabs' =>  $mustache->render('tabs-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/homepage/tabs/tabs-list.php'),
    'items' => collect([
        [
            'image' => $image1,
            'content' => [
                'name' => 'Многоквартирный дом, Литер 5',
                'description' => 'район СХПК «Тепличный»',
                'link' => [
                    'href' => '#',
                    'text' => 'Подробнее',
                ],
                'date' => [
                    'title' => 'Дата реализации:',
                    'text' => 'III квартал 2020 г.',
                ],
                'chars' => collect([
                    [
                        'title' => 'Тип',
                        'text' => 'Жилые квартиры',
                    ],
                    [
                        'title' => 'Цена',
                        'text' => 'от 1 948 000 ₽',
                        'desc' => '49 590 ₽ | м2 '
                    ],
                    [
                        'title' => 'Адрес',
                        'text' => 'г. Благовещенск, ул. Тепличная ул, 1',
                    ],
                ]),
            ],
            'link' => '#'
        ],
    ])
];