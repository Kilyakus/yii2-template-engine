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
class ModalAsset extends AssetBundle
{
    public $sourcePath = '@kilyakus/web/assets';
    public $js = [
        'vendors/general/bootstrap-modal/js/bootstrap-modalmanager.js',
        'vendors/general/bootstrap-modal/js/bootstrap-modal.js',
    ];

    public  $css = [
        'vendors/general/bootstrap-modal/css/bootstrap-modal-bs3patch.css',
        'vendors/general/bootstrap-modal/css/bootstrap-modal.css',
    ];

    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];
}
