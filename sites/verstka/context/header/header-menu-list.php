<?php

use ZLabs\BxMustache\Svg;

$icon = new Svg();
$icon->src = '/local/assets/images/header/icon-stock.svg';

return[
    'items' => collect([
        [
            'href' => '#',
            'text' => 'Проекты',
        ],
        [
            'href' => '#',
            'text' => 'Акции',
            'icon' => $icon,
        ],
        [
            'href' => '#',
            'text' => 'Способы покупки',
        ],
        [
            'href' => '#',
            'text' => 'Полезная информация',
        ],
        [
            'href' => '#',
            'text' => 'О компании',
        ],
        [
            'href' => '#',
            'text' => 'Контакты',
        ],
    ]),
];
