<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Dropdown renders a Engine dropdown menu component.
 *
 * For example:
 *
 * Dropdown::widget([
 *    'title' => 'Dropdown title',
 *    'more' => ['label' => 'xxx', 'url' => '/', 'icon' => 'm-icon-swapright'],
 *    'scroller' => ['height' => 200],
 *    'items' => [
 *        ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
 *        '<li class="divider"></li>',
 *        '<li class="dropdown-header">Dropdown Header</li>',
 *        ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
 *     ],
 * ]);
 *
 */
class Dropdown extends \yii\bootstrap\Dropdown
{
    public $encodeLabels = false;

    /**
     * @var string the dropdown title
     */
    public $title;

    public $button;

    public $buttonOptions = [];

    /**
     * @var array the dropdown last item options
     * with the following structure:
     * ```php
     * [
     *     // optional, item label
     *     'label' => 'Show all messages',
     *     // optional, item icon
     *     'icon' => 'm-icon-swapright',
     *     // optional, item url
     *     'url' => '/',
     * ]
     * ```
     */
    public $more = [];

    /**
     * @var array the dropdown item options
     * is an array of the following structure:
     * ```php
     * [
     *   // required, height of the body portlet as a px
     *   'height' => 150,
     *   // optional, HTML attributes of the scroller
     *   'options' => [],
     *   // optional, footer of the scroller. May contain string or array(the options of Link component)
     *   'footer' => [
     *     'label' => 'Show all',
     *   ],
     * ]
     * ```
     */
    public $scroller = [];

    /**
     * Executes the widget.
     */
    public function run()
    {
        echo $this->renderItems($this->items);
    }

    /**
     * Renders menu items.
     * @param array $items the menu items to be rendered
     * @return string the rendering result.
     * @throws InvalidConfigException if the label option is not specified in one of the items.
     */
    protected function renderItems($items, $options = [])
    {
        if(isset($this->button)){
            echo Html::beginTag('div',['class' => 'dropdown']);
            echo Html::button($this->button, ['id' => $this->id, 'data-toggle' => 'dropdown', 'class' => $this->buttonOptions]);
        }
        $lines = [];
        if ($this->title)
        {
            $lines[] = Html::tag('li', $this->title, ['class' => 'dropdown-header']);
        }

        if (!empty($this->scroller))
        {
            if (!isset($this->scroller['height']))
            {
                throw new InvalidConfigException("The 'height' option of Scroller is required.");
            }
            $lines[] = Html::beginTag('li');
            $lines[] = Html::beginTag(
                            'ul', [
                        'style' => 'height: ' . $this->scroller['height'] . 'px;',
                        'class' => 'dropdown-menu-list scroller'
                            ]
            );
        }

        foreach ($items as $i => $item)
        {
            if (isset($item['visible']) && !$item['visible'])
            {
                unset($items[$i]);
                continue;
            }
            if (is_string($item))
            {
                $lines[] = $item;
                continue;
            }

            if (array_key_exists('divider', $item))
            {
                $lines[] = Html::tag('li', '', ['class' => 'divider']);
                continue;
            }

            if (!isset($item['label']))
            {
                throw new InvalidConfigException("The 'label' option is required.");
            }
            $label = $this->encodeLabels ? Html::encode($item['label']) : $item['label'];

            $icon = ArrayHelper::getValue($item, 'icon', null);
            if ($icon)
            {
                $label = Html::tag('i', '', ['alt' => $label, 'class' => $icon]) . ' ' . $label;
            }
            $label .= ArrayHelper::getValue($item, 'badge', '');
            $options = ArrayHelper::getValue($item, 'options', []);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
            $linkOptions['tabindex'] = '-1';
            $content = Html::a($label, ArrayHelper::getValue($item, 'url', 'javascript://'), $linkOptions);
            $lines[] = Html::tag('li', $content, $options);
        }

        if (!empty($this->scroller))
        {
            $lines[] = Html::endTag('ul');
            $lines[] = Html::endTag('li');
        }

        if (!empty($this->more))
        {
            $url = ArrayHelper::getValue($this->more, 'url', 'javascript://');
            $text = ArrayHelper::getValue($this->more, 'label', '');
            $icon = ArrayHelper::getValue($this->more, 'icon', '');
            if ($icon)
            {
                $icon = Html::tag('i', '', ['class' => $icon]);
            }
            $lines[] = Html::tag('li', Html::tag('a', $text . $icon, ['href' => $url]), ['class' => 'external']);
        }
        echo Html::tag('ul', implode("\n", $lines), array_merge($this->options,['aria-labelledby' => $this->id]));

        if(isset($this->button)){
            echo Html::endTag('div');
        }
    }

}
