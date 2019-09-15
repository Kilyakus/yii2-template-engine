<?php
/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\widgets;

use Yii;
use yii\helpers\Html;

/**
 * ButtonGroup renders a button group engine component.
 *
 * For example,
 *
 * ```php
 * // a button group vertically stacked with items configuration
 * echo ButtonGroup::widget([
 *     'vertical' => true,
 *     'buttons' => [
 *         ['label' => 'A'],
 *         ['label' => 'B'],
 *     ]
 * ]);
 *
 * // a button group with an item as a string
 * echo ButtonGroup::widget([
 *     'buttons' => [
 *         Button::widget(['label' => 'A']),
 *         ['label' => 'B'],
 *     ]
 * ]);
 * ```
 */
class ButtonGroup extends \yii\bootstrap\ButtonGroup
{
    /**
     * @var bool Indicates whether the button group appears vertically stacked.
     */
    public $stacked = false;

    public $vertical = false;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if ($this->stacked === true) {
            Html::addCssClass($this->options, 'btn-group-vertical');
        } else {
            Html::addCssClass($this->options, 'btn-group');
        }
    }
}