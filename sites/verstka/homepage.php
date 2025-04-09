<?php

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'new-project.ru: Главная',
    ],
    'title' => 'new-project.ru: Благовещенскстрой',
    'isMainPage' => true,
    'mainClass' => 'index',
    'inlineCss' => collect([
        'bundle-common',
        'bundle-feedback-form',
        'bundle-homepage',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([]),
    'deferredJs' => collect([
        'bundle-common',
        'bundle-homepage',
        'bundle-feedback-form',
    ]),
    'asyncJs' => collect([]),
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');
?>
<div class="container">
    <?= $mustache->render('sections-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/homepage/sections/sections-list.php'); ?>
    <?= $mustache->render('excursion-form', include $_SERVER['DOCUMENT_ROOT'] . '/context/homepage/excursion-form.php'); ?>
</div>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');
