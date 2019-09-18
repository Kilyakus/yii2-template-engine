<?php
namespace kilyakus\web\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/*
    For example:

    echo Peafowl::widget([
        'items' => [
            [
                'label' => 'Title',
                'image' => 'src',
                'url' => 'src'
            ],
            [
                'label' => 'Title',
                'image' => 'src',
                'url' => 'src'
            ],
            [
                'label' => 'Title',
                'image' => 'src',
                'url' => 'src'
            ],
        ]
    ])

*/

class Peafowl extends \yii\bootstrap\Widget
{
    public $pluginSupport = false;

    public $items = [];

    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'kt-media-group']);
    }

    public function run()
    {
        PeafowlAsset::register($this->getView());
        return $this->renderItems();
    }

    public function renderItems()
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }
            $items[] = $this->renderItem($item);
        }

        return Html::tag('div', implode("\n", $items), $this->options);
    }

    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $label = $item['image'] ? Html::img($item['image'], ['style' => 'background:#ebedf2;']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $options = ArrayHelper::merge($options,['data-toggle' => 'kt-tooltip', 'data-skin' => 'dark', 'data-placement' => 'top', 'data-original-title' => $item['label']]);
        $url = ArrayHelper::getValue($item, 'url', 'javascript://');

        Html::addCssClass($options, 'kt-media kt-media--sm kt-media--circle kt-media--dark');
        if($url != 'javascript://'){
            $options['target'] = '_blank';
        }

        return Html::a($label, $url, $options);
    }
}