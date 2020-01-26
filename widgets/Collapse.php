<?php
namespace kilyakus\web\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Collapse renders an accordion bootstrap javascript component.
 *
 * For example:
 *
 * ```php
 * echo Collapse::widget([
 *     'items' => [
 *         // equivalent to the above
 *         [
 *             'label' => 'Collapsible Group Item #1',
 *             'content' => 'Anim pariatur cliche...',
 *             // open its content by default
 *             'contentOptions' => ['class' => 'in']
 *         ],
 *         // another group item
 *         [
 *             'label' => 'Collapsible Group Item #1',
 *             'content' => 'Anim pariatur cliche...',
 *             'contentOptions' => [...],
 *             'options' => [...],
 *         ],
 *         // if you want to swap out .panel-body with .list-group, you may use the following
 *         [
 *             'label' => 'Collapsible Group Item #1',
 *             'content' => [
 *                 'Anim pariatur cliche...',
 *                 'Anim pariatur cliche...'
 *             ],
 *             'contentOptions' => [...],
 *             'options' => [...],
 *             'footer' => 'Footer' // the footer label in list-group
 *         ],
 *     ]
 * ]);
 * ```
 *
 * @see http://getbootstrap.com/javascript/#collapse
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @since 2.0
 */
class Collapse extends \yii\bootstrap\Collapse
{
    /**
     * For example:
     *
     * ```php
     * echo Collapse::widget([
     *     'items' => [
     *       'Introduction' => 'This is the first collapsable menu',
     *       'Second panel' => [
     *           'content' => 'This is the second collapsable menu',
     *       ],
     *       [
     *           'label' => 'Third panel',
     *           'content' => 'This is the third collapsable menu',
     *       ],
     *   ]
     * ])
     * ```
     */
    public $items = [];

    public $encodeLabels = true;

    public $autoCloseItems = true;
    /**
     * @var array the HTML options for the item toggle tag. Key 'tag' might be used here for the tag name specification.
     * For example:
     *
     * ```php
     * [
     *     'tag' => 'div',
     *     'class' => 'custom-toggle',
     * ]
     * ```
     */
    public $itemToggleOptions = [];

    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'panel-group']);
    }

    public function run()
    {
        $this->registerPlugin('collapse');
        return implode("\n", [
            Html::beginTag('div', $this->options),
            $this->renderItems(),
            Html::endTag('div')
        ]) . "\n";
    }

    public function renderItems()
    {
        $items = [];
        $index = 0;
        foreach ($this->items as $key => $item) {

            $active = false;

            $item['headerOptions']['data-toggle'] = 'collapse';

            Html::addCssClass($item['headerOptions'], ['widget' => 'collapse-toggle']);

            if (!$active) {
                Html::addCssClass($item['headerOptions'], ['collapsed' => 'collapsed']);
            }

            // if ($this->autoCloseItems) {
                $item['headerOptions']['data-parent'] = '#' . $this->options['id'];
            // }

            echo Portlet::widget($item);

            // if (!is_array($item)) {
            //     $item = ['content' => $item];
            // }
            // if (!array_key_exists('label', $item)) {
            //     if (is_int($key)) {
            //         throw new InvalidConfigException("The 'label' option is required.");
            //     } else {
            //         $item['label'] = $key;
            //     }
            // }
            // $header = $item['label'];
            // $options = ArrayHelper::getValue($item, 'options', []);
            // Html::addCssClass($options, ['panel' => 'panel', 'widget' => 'panel-default']);
            // $items[] = Html::tag('div', $this->renderItem($header, $item, ++$index), $options);
        }

        // return implode("\n", $items);
    }

    public function renderItem($header, $item, $index)
    {
        if (array_key_exists('content', $item)) {
            $id = $this->options['id'] . '-collapse' . $index;
            $options = ArrayHelper::getValue($item, 'contentOptions', []);
            $options['id'] = $id;
            Html::addCssClass($options, ['widget' => 'panel-collapse', 'collapse' => 'collapse']);

            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            if ($encodeLabel) {
                $header = Html::encode($header);
            }

            $active = false;
            if (isset($options['class'])) {
                $classes = is_string($options['class']) ? preg_split('/\s+/', $options['class'], -1, PREG_SPLIT_NO_EMPTY) : $options['class'];
                $active = in_array('in', $classes, true);
            }

            $itemToggleOptions = array_merge([
                'tag' => 'a',
                'data-toggle' => 'collapse',
            ], $this->itemToggleOptions);
            Html::addCssClass($itemToggleOptions, ['widget' => 'collapse-toggle']);

            if (!$active) {
                Html::addCssClass($itemToggleOptions, ['collapsed' => 'collapsed']);
            }

            if ($this->autoCloseItems) {
                $itemToggleOptions['data-parent'] = '#' . $this->options['id'];
            }

            $itemToggleTag = ArrayHelper::remove($itemToggleOptions, 'tag', 'a');
            if ($itemToggleTag === 'a') {
                $headerToggle = Html::a($header, '#' . $id, $itemToggleOptions) . "\n";
            } else {
                $itemToggleOptions['data-target'] = '#' . $id;
                $headerToggle = Html::tag($itemToggleTag, $header, $itemToggleOptions) . "\n";
            }

            $header = Html::tag('h4', $headerToggle, ['class' => 'panel-title']);

            if (is_string($item['content']) || is_numeric($item['content']) || is_object($item['content'])) {
                $content = Html::tag('div', $item['content'], ['class' => 'panel-body']) . "\n";
            } elseif (is_array($item['content'])) {
                $content = Html::ul($item['content'], [
                    'class' => 'list-group',
                    'itemOptions' => [
                        'class' => 'list-group-item'
                    ],
                    'encode' => false,
                ]) . "\n";
                if (isset($item['footer'])) {
                    $content .= Html::tag('div', $item['footer'], ['class' => 'panel-footer']) . "\n";
                }
            } else {
                throw new InvalidConfigException('The "content" option should be a string, array or object.');
            }
        } else {
            throw new InvalidConfigException('The "content" option is required.');
        }
        $group = [];

        $group[] = Html::tag('div', $header, ['class' => 'panel-heading']);
        $group[] = Html::tag('div', $content, $options);

        return implode("\n", $group);
    }
}
