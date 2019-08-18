<?php
/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace hustshenl\metronic\bundles;

use yii\web\AssetBundle;

class EditableFormAsset extends AssetBundle
{

    public $sourcePath = '@hustshenl/metronic/assets';
    public static $extraJs = [];
    public $js = [
        'plugins/jquery.mockjax.js',
        'plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js',
        'plugins/bootstrap-editable/inputs-ext/address/address.js',
        'plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js',
        //'admin/pages/scripts/form-editable.js',
    ];
    public $css = [
        'plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css',
        'plugins/bootstrap-editable/inputs-ext/address/address.css'
    ];
    public $depends = [
        'hustshenl\metronic\bundles\CoreAsset',
    ];

    public function init()
    {
        //$this->js = array_merge($this->js, static::$extraJs);
    }

}