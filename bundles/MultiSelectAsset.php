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
class MultiSelectAsset extends AssetBundle
{
    public $sourcePath = '@hustshenl/metronic/assets';
    public $js = [
        'plugins/jquery-multi-select/js/jquery.multi-select.js',
    ];

    public $css = [
        'plugins/jquery-multi-select/css/multi-select.css',
    ];


    public $depends = [
        'hustshenl\metronic\bundles\CoreAsset',
    ];
}
