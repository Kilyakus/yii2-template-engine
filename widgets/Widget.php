<?php
/**
 * @copyright Copyright (c) 2012 - 2015 SHENL.COM
 * @license http://www.shenl.com/license/
 */

namespace kilyakus\web\widgets;

use Yii;
use yii\helpers\Json;

/**
 * This is the base class for Engine widgets.
 *
 * @author icron.org <arbuscula@gmail.com>
 * @since 1.0
 */
class Widget extends \yii\bootstrap\Widget
{
    /**
     * @var array the HTML attributes for the widget container tag.
     */
    public $options = [];
    /**
     * @var array the options for the underlying Engine JS plugin.
     * Please refer to the corresponding Engine plugin Web page for possible options.
     * For example, [this page](http://yii2engine.icron.org/javascript.html#portlet) shows
     * how to use the "Portlet" plugin and the supported options (e.g. "loadSuccess").
     */
    public $clientOptions = [];
    /**
     * @var array the event handlers for the underlying Engine JS plugin.
     * Please refer to the corresponding Engine plugin Web page for possible events.
     * For example, [this page](http://yii2engine.icron.org/javascript.html#portlet) shows
     * how to use the "Portlet" plugin and the supported events (e.g. "close.mr.portlet").
     */
    public $clientEvents = [];

    /**
     * Registers a specific Bootstrap plugin and the related events
     * @param string $name the name of the Bootstrap plugin
     */
    protected function registerPlugin($name)
    {
        $view = $this->getView();
        $id = $this->options['id'];
        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
            $js = "jQuery('#$id').$name($options);";
            $view->registerJs($js);
        }
        if (!empty($this->clientEvents)) {
            $js = [];
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#$id').on('$event', $handler);";
            }
            $view->registerJs(implode("\n", $js));
        }
    }
}
