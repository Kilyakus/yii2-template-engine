<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace hustshenl\metronic\bundles;

use yii\web\AssetBundle;

class TreeAsset extends AssetBundle {

    /**
     * @var string source path
     */
    public $sourcePath = '@hustshenl/metronic/assets';

    /**
     * @var array CSS
     */
    public $css = [
        'global/plugins/jstree/dist/themes/default/style.min.css',
    ];
    public $js = [  
        'global/plugins/jstree/dist/jstree.min.js',
    ];
    
    /**
     * @var array depends on
     */
    public $depends = [
        'hustshenl\metronic\bundles\CoreAsset',
    ];

}
