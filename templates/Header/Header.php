<?php
namespace kilyakus\web\templates\Header;

use Yii;

/*
	
	Header::widget([
		'pluginOptions' => [
			'adminPanel' => true,
		]
	]);

*/

class Header extends \yii\bootstrap\Widget
{
	public $pluginOptions = [];

	public function init()
	{
		parent::init();
	}

    public function run()
    {
        HeaderAsset::register($this->getView());

        return $this->render('_header',['pluginOptions' => $this->pluginOptions]);
    }
}