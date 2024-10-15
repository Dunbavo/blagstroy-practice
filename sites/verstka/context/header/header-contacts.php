<?php

use ZLabs\BxMustache\Svg;

$icon1 = new Svg();
$icon1->src = '/local/assets/images/header/icon-phone.svg';

$icon2 = new Svg();
$icon2->src = '/local/assets/images/header/icon-mail.svg';

return [
    'items' => collect([
        [
            'icon' => $icon1,
            'title' => 'Отдел продаж',
            'link' => [
                'href' => 'tel:84162528017',
                'text' => '8 (4162) 528-017'
            ]
        ],
        [
            'icon' => $icon2,
            'link' => [
                'href' => 'mailto:blagstroy@mail.ru',
                'text' => 'blagstroy@mail.ru'
            ]
        ],
    ])
];