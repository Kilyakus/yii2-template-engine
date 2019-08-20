<?php
/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

/**
 * SpinnerAsset for spinner widget.
 */
class TagInputAsset extends AssetBundle {

    public $sourcePath = '@kilyakus/web/assets';
    public $js = [
        'global/plugins/jquery-tags-input/jquery.tagsinput.min.js',
    ];
    public $css = [
        'global/plugins/jquery-tags-input/jquery.tagsinput.css',
    ];
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];

}