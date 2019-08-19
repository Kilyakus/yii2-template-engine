<?php
/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace  kilyakus\web\bundles;

use yii\web\AssetBundle;

/**
 * SpinnerAsset for spinner widget.
 */
class SpinnerAsset extends AssetBundle
{
    public $sourcePath = '@hustshenl/engine/assets';
    public $js = [
        'plugins/fuelux/js/spinner.min.js',
    ];

    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];
}
