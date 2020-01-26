<?php
namespace kilyakus\web\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kilyakus\portlet\Portlet;
use kilyakus\widget\dropdown\Dropdown;

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
class Tabs extends \yii\bootstrap\Tabs {

    // Tab placements.
    const PLACEMENT_ABOVE = 'above';
    const PLACEMENT_BELOW = 'below';
    const PLACEMENT_LEFT = 'left';
    const PLACEMENT_RIGHT = 'right';
    // Tab type
    const NAV_TYPE_TABS = 'nav-tabs';
    const NAV_TYPE_PILLS = 'nav-pills';


    public $navType = self::NAV_TYPE_TABS;

    public $placement = self::PLACEMENT_ABOVE;

    public $justified = false;

    public $portlet = [];

    public function init()
    {
        if ($this->justified)
        {
            Html::addCssClass($this->options, 'nav-justified');
        }

        if (!empty($this->portlet))
        {
            Portlet::begin($this->portlet);
        }

        Html::addCssClass($this->options, 'nav ' . $this->navType);
        parent::init();
    }

    public function run()
    {
        $classWrap = ['tabs-' . $this->placement];

        if ($this->justified)
        {
            $classWrap[] = 'nav-justified';
        }

        echo Html::beginTag('div', ['class' => implode(' ', $classWrap)]);
        echo parent::run();
        echo Html::endTag('div');

        if (!empty($this->portlet))
        {
            Portlet::end();
        }
    }

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
                $label .= ' <b class="caret"></b>';

                Html::addCssClass($headerOptions, 'dropdown');

                if ($this->renderDropdown($n, $item['items'], $panes))
                {
                $label .= ' <b class="caret"></b>';
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
                throw new InvalidConfigException("Either the 'content' or 'items' option must be set.");
            }

            $headers[] = Html::tag('li', $header, $headerOptions);
        }

        // $headers = [\kilyakus\nav\Nav::widget([
        //     'id' => $this->id,
        //     // 'navbar' => 'nav-tabs',
        //     'position' => 'pull-right',
        //     'items' => $this->items
        // ])];

        $headers = Html::tag('ul', implode("\n", $headers), $this->options);
        $panes = Html::tag('div', implode("\n", $panes), ['class' => 'tab-content']);

        if (!empty($this->portlet))
        {
            $headers = Html::beginTag('div', ['class' => 'kt-portlet__head']) . $headers . Html::endTag('div');
        }

        return ($this->placement == self::PLACEMENT_BELOW) ? ($panes . "\n" . $headers) : ($headers . "\n" . $panes);
    }

}
