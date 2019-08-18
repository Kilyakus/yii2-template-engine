<?php
/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace  hustshenl\metronic\bundles;

use yii\web\AssetBundle;

/**
 * SpinnerAsset for spinner widget.
 */
class SpinnerAsset extends AssetBundle
{
    public $sourcePath = '@hustshenl/metronic/assets';
    public $js = [
        'plugins/fuelux/js/spinner.min.js',
    ];

    public $depends = [
        'hustshenl\metronic\bundles\CoreAsset',
    ];
}
