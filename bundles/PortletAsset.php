<?php
namespace  kilyakus\web\bundles;

use yii\web\AssetBundle;

class PortletAsset extends AssetBundle
{
    public $sourcePath = '@kilyakus/web/assets';
    public $js = [
        // 'vendors/widget-portlet/js/...',
    ];

    public $css = [
        'vendors/widget-portlet/css/portlet.css',
    ];

    public $cssOptions = [
        'position' => \yii\web\View::POS_END,
    ];

    public $depends = [];

}
