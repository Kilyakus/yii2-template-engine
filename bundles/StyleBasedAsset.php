<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;
use yii\helpers\ArrayHelper;
use kilyakus\web\Metronic;

class StyleBasedAsset extends AssetBundle {

    /**
     * @var string source assets path
     */
    public $sourcePath = '@hustshenl/engine/assets';

    /**
     * @var array depended bundles
     */
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [
        'global/css/plugins.css',
    ];

    /**
     * @var array js assets
     */
    public $js = [
            //'scripts/layout.js',
            //'scripts/app.js',
            //'scripts/init.js',
    ];

    /**
     * @var array style based css
     */
    private $styleBasedCss = [
        Metronic::STYLE_SQUARE => [
            'global/css/components.css',
        ],
        Metronic::STYLE_ROUNDED => [
            'global/css/components-rounded.css',
        ],
    ];

    /**
     * Inits bundle
     */
    public function init()
    {
        $this->_handleStyleBased();

        return parent::init();
    }

    /**
     * Handles style based files
     */
    private function _handleStyleBased()
    {
        $this->css = ArrayHelper::merge($this->styleBasedCss[Metronic::getComponent()->style], $this->css);
    }

}
