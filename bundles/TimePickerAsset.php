<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

class TimePickerAsset extends AssetBundle {

    public $sourcePath = '@kilyakus/web/assets';
    public static $extraJs = [];
    public $js = [
        'vendors/general/bootstrap-timepicker/js/bootstrap-timepicker-48.js',
    ];
    public $css = [
        'vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
    ];
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];

    public function init()
    {
        //$this->js = array_merge($this->js, static::$extraJs);
    }

}
