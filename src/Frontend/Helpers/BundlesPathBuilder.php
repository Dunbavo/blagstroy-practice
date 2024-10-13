<?php

namespace ZLabs\Frontend\Helpers;

use Illuminate\Support\Collection;
use ZLabs\EnvSingleton;

class BundlesPathBuilder
{
    protected const DEV_BUNDLES_PATH = '/local/assets/dev/';
    protected const ASSETS_PATH_FILE = '/../../assets.json';

    public static function buildCssAssets(Collection $assetsList): Collection
    {
        return static::buildAssets($assetsList, 'css');
    }

    public static function buildJsAssets($assetsList): Collection
    {
        return static::buildAssets($assetsList, 'js');
    }

    public static function buildAssets(Collection $assetsList, string $ext): Collection
    {
        $frontendDevMode = !EnvSingleton::getInstance()->isFrontendMode();

        if ($assetsList->isEmpty()) return $assetsList;

        if ($frontendDevMode) {
            return static::buildFrontendDevAssets($assetsList, $ext);
        } else {
            $proxyList = static::getProxyList();
            if ($proxyList->isEmpty()) return $assetsList;

            return static::buildFrontendDemoAssets($assetsList, $ext);
        }
    }

    static protected function getProxyList(): Collection
    {
        $proxy = [];

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . self::ASSETS_PATH_FILE)) {
            $jsonContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . self::ASSETS_PATH_FILE);

            if (!empty($jsonContent)) {
                $proxy = json_decode($jsonContent, true);
            }
        }

        return collect($proxy);
    }

    static public function buildFrontendDevAssets($assetsList, $ext): Collection
    {
        return $assetsList->map(function ($asset) use ($ext) {
            if (static::checkIsBundle($asset)) {
                return static::handleBundleAsset($asset, $ext);
            }

            return $asset;
        });
    }

    static public function checkIsBundle($asset): bool
    {
        // todo: Подумать над условиями проверки
        return mb_substr($asset, 0, 4) !== 'http' && mb_substr($asset, 0, 6) === 'bundle';
    }

    static public function handleBundleAsset($asset, $ext): string
    {
        return self::DEV_BUNDLES_PATH . $asset . '/' . $asset . '.' . $ext;
    }

    static public function buildFrontendDemoAssets($assetsList, $ext): Collection
    {
        $proxyList = self::getProxyList();

        return $assetsList->map(function ($asset) use ($proxyList, $ext) {
            if (static::checkIsBundle($asset)) {
                return $proxyList->get($asset)[$ext];
            }

            return $asset;
        })->filter(function ($path) {
            return !!$path;
        })->values();
    }
}