<?php
namespace kilyakus\web\templates\Header;

class HeaderAsset extends \yii\web\AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
    }

    public $css = [
        'css/_header.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'kilyakus\library\base\BaseAsset',
    ];
}
