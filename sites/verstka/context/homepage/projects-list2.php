<?php

use ZLabs\BxMustache\AdaptiveImage;

$image1 = new AdaptiveImage();
$image1->alt = 'Многоквартирный дом, Литер 5';
$image1->mdSrc = '/local/assets/images/temp/projects-list/image-project-1-mobile.jpg';
$image1->src = '/local/assets/images/temp/projects-list/image-project-1-tablet.jpg';

return [
    'items' => collect([
        [
            'image' => $image1,
            'name' => 'Многоквартирный дом, Литер 5',
            'description' => 'район СХПК «Тепличный»',
            'link' => '#',
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
            'detailPageUrl' => '#'
        ],
    ]),
];