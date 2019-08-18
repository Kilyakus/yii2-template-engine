<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace hustshenl\metronic\bundles;

use yii\web\AssetBundle;

class TimePickerAsset extends AssetBundle {

    public $sourcePath = '@hustshenl/metronic/assets';
    public static $extraJs = [];
    public $js = [
        'global/plugins/bootstrap-timepicker/js/bootstrap-timepicker-48.js',
    ];
    public $css = [
        'global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
    ];
    public $depends = [
        'hustshenl\metronic\bundles\CoreAsset',
    ];

    public function init()
    {
        //$this->js = array_merge($this->js, static::$extraJs);
    }

}
