<?php
namespace kilyakus\web\templates\Header;

use Yii;

/*
	
	Header::widget([
		'menu' => [
			'adminPanel' => true,
		],
		'topbar' => [
			'userbar' => [
				'items' => [
                    [
                        'label' => Yii::t('demo', 'Control Panel'),
                        'description' => Yii::t('demo', 'System management'),
                        'url' => Url::toRoute(['/demo']),
                        'icon' => 'fa fa-desktop',
                        'iconOptions' => [
                            'class' => 'kt-font-danger',
                        ],
                        'visible' => IS_MODER,
                    ],
                ]
			]
		]
	]);

*/

class Header extends \yii\bootstrap\Widget
{
	public $options = [];

	public $menu = [];

	public $topbar = [];

	public function init()
	{
		parent::init();
	}

    public function run()
    {
        HeaderAsset::register($this->getView());

        return $this->render('_header',['options' => $this->options, 'menu' => $this->menu, 'topbar' => $this->topbar]);
    }
}