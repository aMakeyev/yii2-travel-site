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
        //'css/site.css',
		//'css/bootstrap.min.css',
		'css/style.css',
    ];
    public $js = [
		//'js/jquery-3.3.1.min.js',
		//'js/popper.min.js',
		//'js/bootstrap.min.js',
		'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
		'yii\bootstrap4\BootstrapPluginAsset',
		//'yii\bootstrap4\BootstrapAsset',
		//'yii\bootstrap\BootstrapAsset',
    ];
}
