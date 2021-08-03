<?php
namespace hail812\adminlte3\assets;

use yii\web\AssetBundle;

class AdminLteAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';

    public $css = [
        'css/adminlte.min.css',
        '/plugins/chart.js/Chart.css',
    ];

    public $js = [
        'js/adminlte.min.js',
        '/plugins/chart.js/Chart.js',
        '/plugins/chart.js/Chart.bundle.js'

    ];

    public $depends = [
        'hail812\adminlte3\assets\BaseAsset',
        'hail812\adminlte3\assets\PluginAsset',


    ];
}