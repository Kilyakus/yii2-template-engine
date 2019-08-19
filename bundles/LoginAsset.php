<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle {

    /**
     * @var string source assets path
     */
    public $sourcePath = '@hustshenl/engine/assets';

    /**
     * @var array depended packages
     */
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [
        'admin/pages/css/login.css',
    ];

    /**
     * @var array js assets
     */
    public $js = [
        'global/plugins/jquery-validation/js/jquery.validate.min.js',
        'admin/pages/scripts/login.js',
    ];


}
