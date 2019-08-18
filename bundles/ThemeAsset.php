<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace hustshenl\metronic\bundles;

use yii\web\AssetBundle;
use hustshenl\metronic\Metronic;

class ThemeAsset extends AssetBundle {

    /**
     * @var string source assets path
     */
    public $sourcePath = '@hustshenl/metronic/assets/admin/{version}';

    /**
     * @var array depended bundles
     */
    public $depends = [
        'hustshenl\metronic\bundles\CoreAsset',
        'hustshenl\metronic\bundles\StyleBasedAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [
        'css/layout.css',
        'css/themes/{theme}.css',
        'css/custom.css',
    ];

    /**
     * @var array js assets
     */
    public $js = [
        'scripts/layout.js',
        'scripts/demo.js',
        'scripts/quick-sidebar.js',
    ];

    /**
     * Inits bundle
     */
    public function init()
    {
        $this->_handleSourcePath();

        $this->_handleDynamicCss();

        return parent::init();
    }

    /**
     * Parses source path
     */
    private function _handleSourcePath()
    {
        Metronic::getComponent()->parseAssetsParams($this->sourcePath);
    }

    /**
     * Parses dynamic css
     */
    private function _handleDynamicCss()
    {
        array_walk($this->css, array(Metronic::getComponent(), 'parseAssetsParams'));
    }

}
