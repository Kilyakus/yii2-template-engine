<?php

/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\widgets;

use yii\helpers\Url;
use \yii\helpers\ArrayHelper;
use kilyakus\web\bundles\ListViewAsset;
use kilyakus\web\bundles\ListViewSortableAsset;

class ListView extends \yii\widgets\ListView {

    const SORTABLE_ITEM_CLASS = 'sortable-item';

    /**
     * @var boolean indicates if grid is sortable
     */
    public $sortable = [];

    /**
     * @var string pjax container
     */
    public $clientOptions;

    /**
     * Inits widget
     */
    public function init()
    {
        parent::init();

        $this->initSortable();
    }

    /**
     * Inits sortable behavior
     */
    protected function initSortable()
    {
        $route = ArrayHelper::getValue($this->sortable, 'url', false);
        
        if ($route)
        {
            $url = Url::toRoute($route);

            if (ArrayHelper::keyExists('class', $this->itemOptions))
            {
                $this->itemOptions['class'] = sprintf('%s %s', $this->itemOptions['class'], self::SORTABLE_ITEM_CLASS);
            }
            else
            {
                $this->itemOptions['class'] = self::SORTABLE_ITEM_CLASS;
            }

            $options = json_encode(ArrayHelper::getValue($this->sortable, 'options', []));
            
            $view = $this->getView();
            $view->registerJs("jQuery('#{$this->id}').SortableListView('{$url}', {$options});");
            $view->registerJs("jQuery('#{$this->id}').on('sortableSuccess', function() {jQuery.pjax.reload(" . json_encode($this->clientOptions) . ")})", \yii\web\View::POS_END);
            ListViewSortableAsset::register($view);
        }
    }

}
