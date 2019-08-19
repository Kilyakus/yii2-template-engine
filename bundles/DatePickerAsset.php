<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

class DatePickerAsset extends AssetBundle {

    public $sourcePath = '@hustshenl/engine/assets';
    public static $extraJs = [];
    public $js = [
        'plugins/bootstrap-daterangepicker/moment.min.js',
        'plugins/bootstrap-datepicker-extended/js/bootstrap-datepicker.js',
    ];
    public $css = [
        'plugins/bootstrap-datepicker-extended/css/datepicker.css',
        'plugins/bootstrap-datepicker-extended/css/datepicker3.css',
    ];
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];

    public function init()
    {
        $this->js = array_merge($this->js, static::$extraJs);
    }

}
