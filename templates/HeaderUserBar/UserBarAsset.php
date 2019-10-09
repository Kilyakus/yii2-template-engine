<?php
namespace kilyakus\web\templates\HeaderUserBar;

class UserBarAsset extends \yii\web\AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
    }

    public $css = [
        'css/template_header_topbar_userbar.css',
    ];
}
