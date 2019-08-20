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
class Select2Asset extends AssetBundle
{
    public $sourcePath = '@kilyakus/web/assets';
    public $js = [
        'global/plugins/select2/select2.min.js',
    ];

    public $css = [
        'global/plugins/select2/select2.css',
        'global/plugins/select2/select2-bootstrap.css',
    ];


    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];
}
