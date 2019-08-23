<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

class CoreAsset extends AssetBundle {

    /**
     * @var string source assets path
     */
    public $sourcePath = '@kilyakus/web/assets/vendors';

    /**
     * @var array depended packages
     */
    public $depends = [
        'yii\web\YiiAsset',
        'kilyakus\base\BaseAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [
    ];

    /**
     * @var array js assets
     */
    public $js = [
        'general/js-cookie/src/js.cookie.js',
        'general/sticky-js/dist/sticky.min.js',
    ];

    /**
     * @var array js options
     */
    // public $jsOptions = [
    //     'conditions' => [
    //         'plugins/respond.min.js' => 'if lt IE 9',
    //         'plugins/excanvas.min.js' => 'if lt IE 9',
    //     ],
    // ];
}
