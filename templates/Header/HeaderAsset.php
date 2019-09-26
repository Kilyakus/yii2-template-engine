<?php
namespace kilyakus\web\templates\Header;

class HeaderAsset extends \kilyakus\widgets\AssetBundle
{
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/header'],'template-header');
        parent::init();
    }
}
