<?php

use ZLabs\BxMustache\Svg;

$icon = new Svg();
$icon->src = '/local/assets/images/header/icon-stock.svg';

return[
    'items' => collect([
        [
            'href' => '#',
            'text' => 'Проекты',
            'active' => false,
            'submenu' => collect([
                [
                    'href' => '#',
                    'text' => 'Жилые комплексы',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Коммерчиские помещения',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Социально-культурные',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Гаражи',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Горячие предложения',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Архив проектов',
                    'active' => false,
                ],
            ])
        ],
        [
            'href' => '#',
            'text' => 'Акции',
            'active' => false,
            'icon' => $icon,
        ],
        [
            'href' => '#',
            'text' => 'Способы покупки',
            'active' => false,
            'submenu' => collect([
                [
                    'href' => '#',
                    'text' => 'Материнский капитал',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Военная ипотека',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Беспроцентная рассрочка',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Государственные жилищные сертификаты',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Наличный расчет',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Ипотека',
                    'active' => false,
                ],

            ])
        ],
        [
            'href' => '#',
            'text' => 'Полезная информация',
            'active' => false,
        ],
        [
            'href' => '#',
            'text' => 'О компании',
            'active' => false,
            'submenu' => collect([
                [
                    'href' => '#',
                    'text' => 'История компании',
                    'active' => false,
                ],
                [
                    'href' => '#',
                    'text' => 'Документы',
                    'active' => false,
                ],

            ])
        ],
        [
            'href' => '#',
            'text' => 'Контакты',
            'active' => false,
        ],
    ]),
];
