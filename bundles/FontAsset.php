<?php
/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

class FontAsset extends AssetBundle
{
    public $sourcePath = '@kilyakus/web/assets';

    public $css = [
        'vendors/general/font-awesome/css/font-awesome.min.css',
    ];
}
