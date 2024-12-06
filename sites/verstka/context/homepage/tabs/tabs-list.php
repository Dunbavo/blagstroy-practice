<?php

ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/context/homepage/tabs/content.php';
$content = ob_get_clean();

return [
    'tabs' => collect([
        [
            'id' => 'apartments',
            'name' => 'Квартиры',
            'active' => true,
            'content' => $content
        ],
        [
            'id' => 'parking-spaces',
            'name' => 'Машиноместа',
            'active' => false,
            'content' => $content
        ],
        [
            'id' => 'commercial-real-estate',
            'name' => 'Коммерческая недвижимость',
            'active' => false,
            'content' => $content
        ],
    ])
];