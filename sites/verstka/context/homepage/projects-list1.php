<?php

use ZLabs\BxMustache\AdaptiveImage;

$image1 = new AdaptiveImage();
$image1->alt = 'Многоквартирный дом, Литер 5';
$image1->mdSrc = '/local/assets/images/temp/projects-list/image-project-1-mobile.jpg';
$image1->src = '/local/assets/images/temp/projects-list/image-project-1-tablet.jpg';

$image2 = new AdaptiveImage();
$image2->alt = 'Многоквартирный жилой дом Литер 1А';
$image2->mdSrc = '/local/assets/images/temp/projects-list/image-project-2-mobile.jpg';
$image2->src = '/local/assets/images/temp/projects-list/image-project-2-tablet.jpg';

$image3 = new AdaptiveImage();
$image3->alt = 'Многоквартирный жилой дом Литер 1А';
$image3->mdSrc = '/local/assets/images/temp/projects-list/image-project-3-mobile.jpg';
$image3->src = '/local/assets/images/temp/projects-list/image-project-3-tablet.jpg';

$image4 = new AdaptiveImage();
$image4->alt = 'Многоквартирный жилой дом Литер 1А';
$image4->mdSrc = '/local/assets/images/temp/projects-list/image-project-4-mobile.jpg';
$image4->src = '/local/assets/images/temp/projects-list/image-project-4-tablet.jpg';

return [
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
                'address' => 'г. Благовещенск, ул. Тепличная ул, 1',
                'chars' => [
                    'type' => 'Жилые квартиры',
                    'price' => 'от 1 948 000 ₽',
                    'squareMeter' => '49 590 ₽ | м2 ',
                    'address' => 'г. Благовещенск, ул. Тепличная ул, 1',
                ],
            ],
            'link' => '#'
        ],
        [
            'image' => $image2,
            'content' => [
                'name' => 'Многоквартирный жилой дом Литер 1А',
                'description' => 'район СХПК «Тепличный»',
                'link' => [
                    'href' => '#',
                    'text' => 'Подробнее',
                ],
                'date' => [
                    'title' => 'Дата реализации:',
                    'text' => 'III квартал 2020 г.',
                ],
                'address' => 'г. Благовещенск, ул. Тепличная ул, 1',
                'chars' => [
                    'type' => 'Жилые квартиры',
                    'price' => 'от 1 948 000 ₽',
                    'squareMeter' => '49 590 ₽ | м2 ',
                    'address' => 'г. Благовещенск, ул. Тепличная ул, 1',
                ],
            ],
            'link' => '#'
        ],
        [
            'image' => $image3,
            'content' => [
                'name' => 'Многоквартирный жилой дом Литер 1А',
                'description' => 'район СХПК «Тепличный»',
                'link' => [
                    'href' => '#',
                    'text' => 'Подробнее',
                ],
                'date' => [
                    'title' => 'Дата реализации:',
                    'text' => 'III квартал 2020 г.',
                ],
                'address' => 'г. Благовещенск, ул. Тепличная ул, 1',
                'chars' => [
                    'type' => 'Жилые квартиры',
                    'price' => 'от 1 948 000 ₽',
                    'squareMeter' => '49 590 ₽ | м2 ',
                    'address' => 'г. Благовещенск, ул. Тепличная ул, 1',
                ],
            ],
            'link' => '#'
        ],
        [
            'image' => $image4,
            'content' => [
                'name' => 'Многоквартирный жилой дом Литер 1А',
                'description' => 'район СХПК «Тепличный»',
                'link' => [
                    'href' => '#',
                    'text' => 'Подробнее',
                ],
                'date' => [
                    'title' => 'Дата реализации:',
                    'text' => 'III квартал 2020 г.',
                ],
                'address' => 'г. Благовещенск, ул. Тепличная ул, 1',
                'chars' => [
                    'type' => 'Жилые квартиры',
                    'price' => 'от 1 948 000 ₽',
                    'squareMeter' => '49 590 ₽ | м2 ',
                    'address' => 'г. Благовещенск, ул. Тепличная ул, 1',
                ],
            ],
            'link' => '#'
        ],
    ]),
    'linkAll' => '#'
];