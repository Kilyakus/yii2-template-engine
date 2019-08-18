<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace hustshenl\metronic\bundles;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle {

    /**
     * @var string source assets path
     */
    public $sourcePath = '@hustshenl/metronic/assets';

    /**
     * @var array depended packages
     */
    public $depends = [
        'hustshenl\metronic\bundles\CoreAsset',
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
