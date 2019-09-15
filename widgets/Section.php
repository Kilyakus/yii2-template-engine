<?php
namespace kilyakus\web\widgets;

use Yii;
use kilyakus\web\Engine;
use kilyakus\web\bundles\PortletAsset;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Portlet renders a engine portlet.
 * Any content enclosed between the [[begin()]] and [[end()]] calls of Portlet
 * is treated as the content of the portlet.
 * For example,
 *
 * ```php
 * // Simple portlet
 * Portlet::begin([
 *   'icon' => 'fa fa-bell-o',
 *   'title' => 'Title Portlet',
 * ]);
 * echo 'Body portlet';
 * Portlet::end();
 *
 * // Portlet with tools, actions, scroller, events and remote content
 * Portlet::begin([
 *   'title' => 'Extended Portlet',
 *   'scroller' => [
 *     'height' => 150,
 *     'footer' => ['label' => 'Show all', 'url' => '#'],
 *   ],
 *   'clientOptions' => [
 *     'loadSuccess' => new \yii\web\JsExpression('function(){ console.log("load success"); }'),
 *     'remote' => '/?r=site/about',
 *   ],
 *   'clientEvents' => [
 *     'close.mr.portlet' => 'function(e) { console.log("portlet closed"); e.preventDefault(); }'
 *   ],
 *   'tools' => [
 *     Portlet::TOOL_RELOAD,
 *     Portlet::TOOL_MINIMIZE,
 *     Portlet::TOOL_CLOSE,
 *   ],
 * ]);
 * ```
 *
 * @see http://yii2engine.icron.org/components.html#portlet
 * @author icron.org <arbuscula@gmail.com>
 * @since 1.0
 */
class Section extends Widget {

    public $title;

    public $color;

    public $type; // last

    public $size;

    public $separator = [];

    public $scroller = [];

    public $options = [];

    public $bodyOptions = [];

    public $headerOptions = [];

    public $headerContent;

    public $footerOptions = [];

    public $footerContent;

    public $footer = [];

    public function init()
    {
        parent::init();
        
        Html::addCssClass($this->options, trim(sprintf('kt-section %s', $this->type)));
        echo '<!-- begin:: Widgets/Section -->';

        if(isset($this->separator)){
            echo Html::tag('div',null,['class' => 'kt-separator kt-separator--border-dashed']);
        }

        echo Html::beginTag('div', $this->options);

        $this->_renderTitle();

        $this->_renderScrollerBegin();

        Html::addCssClass($this->bodyOptions, 'kt-section__body');
        echo Html::beginTag('div', $this->bodyOptions);

    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        $this->_renderScrollerEnd();

        echo Html::endTag('div'); // End section body
        echo Html::endTag('div'); // End section div
        echo '<!-- end:: Widgets/Section -->';
        //$loader = Html::img(Engine::getAssetsUrl($this->view) . '/img/loading-spinner-grey.gif');
        //$this->clientOptions['loader'] = ArrayHelper::getValue($this->clientOptions, 'loader', $loader);
        PortletAsset::register($this->view);
        //$this->registerPlugin('section');
    }

    private function _renderTitle()
    {
        if($this->headerContent){
            Html::addCssClass($this->headerOptions, 'kt-section__head');

            echo Html::beginTag('div', $this->headerOptions);
            echo $this->headerContent;
            echo Html::endTag('div');

        }elseif ($this->title)
        {
            Html::addCssClass($this->headerOptions, 'kt-section__head');

            echo Html::beginTag('div', $this->headerOptions);

            echo Html::beginTag('div', ['class' => 'kt-portlet__head-label']);

            echo Html::tag('h3', $this->title, ['class' => $this->pushFontColor('kt-section__title')]);

            echo Html::endTag('div');

            $this->_renderTools();

            $this->_renderActions();

            echo Html::endTag('div');
        }
    }

    /**
     * Renders portlet tools
     */
    private function _renderTools()
    {
        if (!empty($this->tools))
        {
            $tools = [];

            foreach ($this->tools as $tool)
            {
                $class = '';
                switch ($tool)
                {
                    case self::TOOL_CLOSE :
                        $class = 'remove';
                        break;

                    case self::TOOL_MINIMIZE :
                        $class = 'collapse';
                        break;

                    case self::TOOL_RELOAD :
                        $class = 'reload';
                        break;
                }
                $tools[] = Html::tag('a', ($tool['label'] ? $tool['label'] : ''), ['class' => 'btn btn-clean btn-icon-sm '.$class, 'href' => '']);
            }

            echo Html::tag('div', implode("\n", $tools), ['class' => 'kt-portlet__head-toolbar']);
        }
    }

    /**
     * Renders portlet actions
     */
    private function _renderActions()
    {
        if (!empty($this->actions))
        {
            echo Html::tag('div', implode("\n", $this->actions), ['class' => 'actions']);
        }
    }

    /**
     * Renders scroller begin
     * @throws InvalidConfigException
     */
    private function _renderScrollerBegin()
    {
        if (!empty($this->scroller))
        {
            if (!isset($this->scroller['height']))
            {
                Yii::$app->session->setFlash('error', 'Widgets/' . (new \ReflectionClass(get_class($this)))->getShortName() . ': ' . Yii::t('easyii', 'The "height" option of the scroller is required.'));
            }
            $options = ArrayHelper::getValue($this->scroller, 'options', []);

            $checkFormat = ($this->scroller['format'] ? $this->scroller['format'] : ($this->scroller['format'] = 'px')) == 'px';

            echo Html::beginTag(
                    'div', ArrayHelper::merge(
                            (
                                $checkFormat ? [
                                    'data-scroll' => 'true', 'data-height' => $this->scroller['height'], 'data-mobile-height' => $this->scroller['height']
                                ] : [
                                    'data-scroll' => 'true',
                                ]
                            ), $options, [
                                'style' => 'height:' . $this->scroller['height'] . $this->scroller['format'] . ';max-height:' . $this->scroller['max-height'] . $this->scroller['format'] . ';'
                            ]
                    )
            );
        }
    }

    /**
     * Renders scroller end
     */
    private function _renderScrollerEnd()
    {
        if (!empty($this->scroller))
        {
            echo Html::endTag('div');
            $footer = ArrayHelper::getValue($this->scroller, 'footer', '');
            if (!empty($footer))
            {
                echo Html::beginTag('div', ['class' => 'scroller-footer']);
                if (is_array($footer))
                {
                    echo Html::tag('div', Link::widget($footer), ['class' => 'pull-right']);
                }
                elseif (is_string($footer))
                {
                    echo $footer;
                }
                echo Html::endTag('div');
            }
        }
    }

    protected function getFontColor()
    {
        if ($this->color)
        {
            return sprintf('font-%s', $this->color);
        }

        return '';
    }

    /**
     * Pushes font color to given string
     */
    protected function pushFontColor($string)
    {
        $color = $this->getFontColor();

        if ($color)
        {
            return sprintf('%s %s', $string, $color);
        }

        return $string;
    }
}
