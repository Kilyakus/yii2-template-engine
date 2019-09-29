<?php
namespace kilyakus\web\templates\HeaderUserBar;

class UserBarAsset extends \yii\web\AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
    }

    public $css = [
        'css/_header_topbar_userbar.css',
    ];
}
