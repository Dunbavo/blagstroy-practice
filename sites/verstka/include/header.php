<?php

use ZLabs\Asset\AsyncJs;
use ZLabs\Asset\DeferredJs;
use ZLabs\Asset\DeferredStyles;
use ZLabs\Asset\InlineJs;
use ZLabs\Asset\InlineStyles;
use ZLabs\Frontend\Helpers\BundlesPathBuilder;
use ZLabs\EnvSingleton;
use ZLabs\Frontend\MustacheSingleton;

/** @var array $pageConfig */
/** @var MustacheSingleton $mustache */

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/')
]);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageConfig['title'] ?></title>
    <?php
    // Если фронтенд собран, покажем стили и скрипты "инлайново"
    if (EnvSingleton::getInstance()->isFrontendMode()) {
        echo (new InlineStyles(BundlesPathBuilder::buildCssAssets($pageConfig['inlineCss'])))->render();
        echo (new InlineJs(BundlesPathBuilder::buildJsAssets($pageConfig['inlineJs'])))->render();
    }
    ?>
</head>
<body class="page">
<div class="fixed-panel">
</div>
<div class="page-inner">
    <header class="header container">
        <div class="header-top">
            <div class="header-top-container">
                <div class="header-logo-wrap">
                    <img src="/local/assets/images/header/header-logo.svg" alt="Благовещенскстрой"
                        width="301" height="47"
                        class="header__logo">
                </div>
                <?= $mustache->render('header-contacts', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/header-contacts.php'); ?>
                <a href="#" class="header-link" data-fancybox>Заказать звонок</a>
            </div>
        </div>
        <div class="header-bottom">
            <div class="header-bottom-container">
                <button class="header-menu-button">
                    <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M28 17.1426V19.9997H0V17.1426H28Z" fill="#342733"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.4 8.57129V11.4284H0V8.57129H22.4Z" fill="#342733"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M28 0V2.85714H0V0H28Z" fill="#342733"/>
                    </svg>
                </button>
                <div class="header-menu-content">
                    <?= $mustache->render('header-menu-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/header-menu-list.php'); ?>
                    <button class="header-search">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.6771 12.9094C15.6612 11.5654 16.2499 9.91462 16.2499 8.12498C16.2499 3.64502 12.6049 0 8.12494 0C3.64498 0 0 3.64502 0 8.12498C0 12.6049 3.64502 16.25 8.12498 16.25C9.91462 16.25 11.5656 15.6612 12.9096 14.677L18.2324 19.9999L20 18.2323C20 18.2323 14.6771 12.9094 14.6771 12.9094ZM8.12498 13.75C5.02318 13.75 2.50001 11.2268 2.50001 8.12498C2.50001 5.02318 5.02318 2.50001 8.12498 2.50001C11.2268 2.50001 13.75 5.02318 13.75 8.12498C13.75 11.2268 11.2267 13.75 8.12498 13.75Z" fill="#342733"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <main class="main <?=$pageConfig['mainClass']?>">