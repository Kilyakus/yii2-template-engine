<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\widgets;

use Yii;
use kilyakus\portlet\PortletAsset;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Tabs renders a Tab Engine component.
 *
 * For example:
 *
 * ```php
 * echo Tabs::widget([
 *     'items' => [
 *         [
 *             'label' => 'One',
 *             'content' => 'Anim pariatur cliche...',
 *             'active' => true
 *         ],
 *         [
 *             'label' => 'Two',
 *             'content' => 'Anim pariatur cliche...',
 *             'headerOptions' => [...],
 *             'options' => ['id' => 'myveryownID'],
 *         ],
 *         [
 *             'label' => 'Dropdown',
 *             'items' => [
 *                  [
 *                      'label' => 'DropdownA',
 *                      'content' => 'DropdownA, Anim pariatur cliche...',
 *                  ],
 *                  [
 *                      'label' => 'DropdownB',
 *                      'content' => 'DropdownB, Anim pariatur cliche...',
 *                  ],
 *             ],
 *         ],
 *     ],
 * ]);
 * ```
 *
 */
class PortletTabs extends \yii\bootstrap\Tabs
{
    const PLACEMENT_ABOVE = 'above';
    const PLACEMENT_BELOW = 'below';
    const PLACEMENT_LEFT = 'left';
    const PLACEMENT_RIGHT = 'right';

    const TYPE_NONE = '';
    const TYPE_DEFAULT = 'default';

    const NAV_TYPE_TABS = 'nav-tabs';
    const NAV_TYPE_PILLS = 'nav-pills';

    public $type = self::TYPE_DEFAULT;
    /**
     * @var string, specifies the Bootstrap tab styling.
     * Valid values 'nav-tabs',  'nav-pills'
     */
    public $navType = self::NAV_TYPE_TABS;

    /**
     * @var string the placement of the tabs.
     * Valid values are 'above', 'below', 'left' and 'right'.
     */
    public $placement = self::PLACEMENT_ABOVE;

    /**
     * @var bool Indicates whether tabs is styled for Engine.
     */
    public $styled = true;

    /**
     * @var bool Indicates whether tabs is justified.
     */
    public $justified = false;

    public $bodyOptions = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if ($this->justified)
        {
            Html::addCssClass($this->options, 'nav-justified');
        }

        $this->bodyOptions = array_merge_recursive(['class' => 'kt-portlet__body tab-content'],$this->bodyOptions);

        Html::addCssClass($this->options, 'nav-tabs-line nav ' . $this->navType);
        parent::init();
    }

    /**
     *  Renders the widget.
     */
    public function run()
    {

        $classWrap = ['kt-portlet kt-portlet--tabs tabs-' . $this->placement . ' ' . $this->type];
        if ($this->styled)
        {
            $classWrap[] = 'tabbable-custom';
            if ($this->justified)
            {
                $classWrap[] = 'nav-justified';
            }
        }
        else
        {
            $classWrap[] = 'tabbable';
        }
        echo Html::beginTag('div', ['class' => implode(' ', $classWrap)]);
        echo parent::run();
        echo Html::endTag('div');
        PortletAsset::register($this->view);
    }

    /**
     * Renders tab items as specified on [[items]].
     * @return string the rendering result.
     * @throws InvalidConfigException.
     */
    protected function renderItems()
    {
        $headers = [];
        $panes = [];

        if (!$this->hasActiveTab() && !empty($this->items))
        {
            $this->items[0]['active'] = true;
        }

        foreach ($this->items as $n => $item)
        {
            if (!isset($item['label']))
            {
                throw new InvalidConfigException("The 'label' option is required.");
            }
            $label = $this->encodeLabels ? Html::encode($item['label']) : $item['label'];
            $headerOptions = array_merge($this->headerOptions, ArrayHelper::getValue($item, 'headerOptions', []));

            if (isset($item['items']))
            {
                if ($this->styled)
                {
                    throw new InvalidConfigException("The 'styled' not support dropdown items. Please, set 'styled' to false.");
                }
                $label .= ' <b class="caret"></b>';
                Html::addCssClass($headerOptions, 'dropdown');

                if ($this->renderDropdown(null, $item['items'], $panes))
                {
                    Html::addCssClass($headerOptions, 'active');
                }

                $header = Html::a($label, "#", ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown']) . "\n"
                        . Dropdown::widget(['items' => $item['items'], 'clientOptions' => false]);
            }
            elseif (isset($item['content']))
            {
                $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
                $options['id'] = ArrayHelper::getValue($options, 'id', $this->options['id'] . '-tab' . $n);

                Html::addCssClass($options, 'tab-pane');
                if (ArrayHelper::remove($item, 'active'))
                {
                    Html::addCssClass($options, 'active');
                    Html::addCssClass($headerOptions, 'active');
                }
                $header = Html::a($label, '#' . $options['id'], ['data-toggle' => 'tab']);
                $panes[] = Html::tag('div', $item['content'], $options);
            }
            else
            {
                Yii::$app->session->setFlash('error', 'Widgets/' . (new \ReflectionClass(get_class($this)))->getShortName() . ': ' . 'Either the \'content\' or \'items\' option must be set.');
            }

            $headers[] = Html::tag('li', $header, $headerOptions);
        }
        $head = Html::beginTag('div', ['class' => 'kt-portlet__head']);
        $head .= Html::tag('ul', implode("\n", $headers), $this->options);
        $head .= Html::endTag('div');
        $panes = Html::tag('div', implode("\n", $panes), $this->bodyOptions);

        return ($this->placement == self::PLACEMENT_BELOW) ? ($panes . "\n" . $head) : ($head . "\n" . $panes);
    }

}
