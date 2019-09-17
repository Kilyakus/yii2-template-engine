<?php
namespace  kilyakus\web\bundles;

use yii\web\AssetBundle;

class NavBarAsset extends AssetBundle
{
    public $sourcePath = '@kilyakus/web/assets/vendors/widget-navbar';
    public $js = [
        // 'js',
    ];

    public  $css = [
        'css/navbar.css',
    ];

    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];
}
