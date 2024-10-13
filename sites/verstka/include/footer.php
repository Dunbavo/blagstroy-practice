<?php

use ZLabs\Asset\AsyncJs;
use ZLabs\Asset\DeferredJs;
use ZLabs\Asset\DeferredStyles;
use ZLabs\Frontend\Helpers\BundlesPathBuilder;
use ZLabs\EnvSingleton;
use ZLabs\Frontend\MustacheSingleton;

/** @var array $pageConfig */
/** @var MustacheSingleton $mustache */
?>
</main>
<footer>Подвал сайта</footer>
<?// page-inner?>
</div>
<?php

$frontendBuilt = EnvSingleton::getInstance()->isFrontendMode();

// Если фронтенд собран, покажем отложенные css файлы
if ($frontendBuilt) {
    echo (new DeferredStyles(BundlesPathBuilder::buildCssAssets($pageConfig['deferredCss']), true))->render();
} else {
    // костыль для вебпак 5 версии. Общий runtime вынесен в отдельный файл
    $pageConfig['deferredJs']->prepend('bundle-runtime');
}

// Эти скрипты всегда будут грузится отложено (defer)
echo (new DeferredJs(BundlesPathBuilder::buildJsAssets($pageConfig['deferredJs']), true))->render();

// Эти скрипты всегда будут грузится отложено (async - нужно использовать scriptsReady в js файлах)
echo (new AsyncJs(BundlesPathBuilder::buildJsAssets($pageConfig['asyncJs']), true))->render();
?>
</body>
</html>