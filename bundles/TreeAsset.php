<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

class TreeAsset extends AssetBundle {

    /**
     * @var string source path
     */
    public $sourcePath = '@kilyakus/web/assets';

    /**
     * @var array CSS
     */
    public $css = [
        'vendors/general/jstree/dist/themes/default/style.min.css',
    ];
    public $js = [  
        'vendors/general/jstree/dist/jstree.min.js',
    ];
    
    /**
     * @var array depends on
     */
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];

}
