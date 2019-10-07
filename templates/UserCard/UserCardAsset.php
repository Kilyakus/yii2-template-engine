<?php
namespace kilyakus\web\templates\UserCard;

class UserCardAsset extends \yii\web\AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
    }

    public $css = [
        'css/_usercard.css',
    ];
}
