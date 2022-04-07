<?php

namespace app\assets;

use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'vendor/fontawesome-free/css/all.min.css',
//        'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
        'css/sb-admin-2.min.css',
        'cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css'
      //  'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'

    ];
    public $js = [
//        'vendor/jquery-easing/jquery.easing.min.js',
        'js/sb-admin-2.min.js',
//        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        'vendor/chart.js/Chart.min.js',
        'js/charts.js',
        'js/area-chart.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        JqueryAsset::class,
        BootstrapPluginAsset::class
    ];
}