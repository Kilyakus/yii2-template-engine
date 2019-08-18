<?php

/**
 * @package   yii2-metronic
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @version   3.0.1
 */

namespace hustshenl\metronic\widgets;

use hustshenl\metronic\bundles\CheckboxColumnAsset;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;

/**
 * Extends the Yii's CheckboxColumn for the Grid widget [[\kartik\widgets\GridView]]
 * with various enhancements.
 *
 * CheckboxColumn displays a column of checkboxes in a grid view.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class CheckboxColumn extends \kartik\grid\CheckboxColumn
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->rowHighlight) {
            $view = $this->grid->getView();
            CheckboxColumnAsset::register($view);
        }

    }
}
