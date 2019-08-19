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
class NotificationAsset extends AssetBundle
{
    public $sourcePath = '@hustshenl/engine/assets';
    public $js = [
        'global/plugins/bootstrap-toastr/toastr.min.js',
    ];

    public $css = [
        'global/plugins/bootstrap-toastr/toastr.min.css',
    ];

    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];
}
