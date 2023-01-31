<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/custom.css',
        'css/fontawesome.css',
        'css/fontawesome.min.css',
        'css/slick-themre.css',
        'css/slick-themre.min.css',
        'css/slick.min.css',
        'css/templatemo.css',
        'css/templatemo.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
