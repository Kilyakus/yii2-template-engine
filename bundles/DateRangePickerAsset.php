<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

/**
 * DateRangePickerAsset for dateRangePicker widget.
 */
class DateRangePickerAsset extends AssetBundle {

    public $sourcePath = '@kilyakus/web/assets';
    public static $extraJs = [];
    public $js = [
        'plugins/bootstrap-daterangepicker/moment.min.js',
        'plugins/bootstrap-daterangepicker/daterangepicker.js',
    ];
    public $css = [
        'plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
        'plugins/bootstrap-datetimepicker/css/datetimepicker.css',
    ];
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];
    public function init()
    {
        $this->js = array_merge($this->js, static::$extraJs);
    }

}
