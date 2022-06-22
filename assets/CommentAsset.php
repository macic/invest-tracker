<?php


namespace app\assets;
use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;


class CommentAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
    'js/new-comment.js',

];
    public $depends = [
        'yii\web\YiiAsset',
        JqueryAsset::class,
    ];

}