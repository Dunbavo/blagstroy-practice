<?php

ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/context/homepage/tabs/tabs-list.php';
$tabs = ob_get_clean();

return [
    'title' => 'Проекты компании',
    'tabs' => $tabs,
    'items' => collect([
        [
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