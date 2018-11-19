<?php

namespace frontend\assets;

use yii\base\View;
use yii\web\AssetBundle;


class ltAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
//            "js/jquery.js",
//            "js/bootstrap.min.js",
        "js/html5shiv.js",
        "js/respond.min.js",
    ];

    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => \yii\web\View::POS_HEAD
    ];
}
