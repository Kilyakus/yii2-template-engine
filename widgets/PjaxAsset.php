<?php
namespace kilyakus\web\widgets;

use yii\web\AssetBundle;

class PjaxAsset extends AssetBundle
{
    public $sourcePath = '@bower/yii2-pjax';
    public $js = [
        'jquery.pjax.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
