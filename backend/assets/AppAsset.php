<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
       // 'assets/AdminLTE/dist/css/AdminLTE.min.css',
        'css/site.css',
        'css/style.css',
        //'css/bootstrap.min.css',

    ];
    public $js = [
        'js/main.js',
        //'assets/AdminLTE/dist/js/adminlte.js'


    ];
    public $depends = [

        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',

    ];
}
