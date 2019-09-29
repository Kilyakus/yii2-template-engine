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
				'adminPanel' => true,
			]
		]
	]);

*/

class Header extends \yii\bootstrap\Widget
{
	public $menu = [];

	public $topbar = [];

	public function init()
	{
		parent::init();
	}

    public function run()
    {
        HeaderAsset::register($this->getView());

        return $this->render('_header',['menu' => $this->menu, 'topbar' => $this->topbar]);
    }
}