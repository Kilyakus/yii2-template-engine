<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

/**
 * IonRangeSliderAsset for slider widget.
 */
class IonRangeSliderAsset extends AssetBundle {

    public $sourcePath = '@kilyakus/web/assets';
    public $js = [
        'global/plugins/ion.rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js',
    ];
    public $css = [
        'global/plugins/ion.rangeslider/css/ion.rangeSlider.css',
        'global/plugins/ion.rangeslider/css/ion.rangeSlider.Engine.css',
    ];
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];

}
