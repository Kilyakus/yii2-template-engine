<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace hustshenl\metronic\bundles;

use yii\web\AssetBundle;

class GridViewAsset extends AssetBundle {

    /**
     * @var string source path
     */
    public $sourcePath = '@hustshenl/metronic/assets';

    /**
     * @var array CSS
     */
    public $css = [
        'global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css',
    ];

}
