<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\bundles;

use yii\web\AssetBundle;

/**
 * SpinnerAsset for spinner widget.
 */
class ListViewSortableAsset extends AssetBundle {

    public $sourcePath = '@hustshenl/engine/assets';

    /**
     * @var array JS
     */
    public $js = [
        'global/scripts/sortable.listview.js',
    ];

    /**
     * @var array depends
     */
    public $depends = [
        'yii\jui\JuiAsset',
    ];

}
