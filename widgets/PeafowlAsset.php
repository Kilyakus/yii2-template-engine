<?php
namespace kilyakus\web\widgets;

class PeafowlAsset extends \kilyakus\widgets\AssetBundle
{
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/peafowl'],'widget-peafowl');
        parent::init();
    }
}
