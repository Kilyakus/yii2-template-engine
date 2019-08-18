<?php

/**
 * @package   yii2-grid
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @version   3.0.1
 */

namespace hustshenl\metronic\bundles;

use yii\web\View;

/**
 * Asset bundle for GridView CheckboxColumn
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class CheckboxColumnAsset extends \kartik\base\AssetBundle
{
    public $sourcePath = '@hustshenl/metronic/assets';
    public $js = [
        'js/grid-checkbox.js',
    ];
    /**
     * @inheritdoc
     */
    public function init()
    {
        //$this->setupAssets('js', ['js/kv-grid-checkbox']);
        parent::init();
    }
}
