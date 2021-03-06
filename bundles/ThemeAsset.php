<?php

/**
 * @link http://www.shenl.com/
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;
use kilyakus\web\Engine;

class ThemeAsset extends AssetBundle {

    /**
     * @var string source assets path
     */
    public $sourcePath = '@kilyakus/web/assets/admin/{version}';

    /**
     * @var array depended bundles
     */
    public $depends = [
        'kilyakus\web\bundles\CoreAsset',
        'kilyakus\web\bundles\StyleBasedAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [
        'css/style.bundle.css',
        // 'css/themes/{theme}.css',
    ];

    /**
     * @var array js assets
     */
    public $js = [
        'js/scripts.bundle.js',
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
        Engine::getComponent()->parseAssetsParams($this->sourcePath);
    }

    /**
     * Parses dynamic css
     */
    private function _handleDynamicCss()
    {
        array_walk($this->css, array(Engine::getComponent(), 'parseAssetsParams'));
    }

}
