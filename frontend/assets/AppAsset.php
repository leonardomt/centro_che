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
        'assets/css/site.css',
        'css/style.css',
        'bootstrap/css/bootstrap.css',
        'assets/AdminLTE/fontawesome-free-5.15.1-web/css/fontawesome.css',

    ];
    public $js = [
        'js/extra.js',
        'bootstrap/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',


    ];
}
