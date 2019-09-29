<?php
namespace kilyakus\web\templates\HeaderUserBar;

use Yii;

/*
	
	UserBar::widget([
		'topbar' => [
			'userbar' => [
				'adminPanel' => true,
			]
		]
	]);

*/

class UserBar extends \yii\bootstrap\Widget
{
	public $userbar = [];

    public function run()
    {
        UserBarAsset::register($this->getView());

        return $this->render('_header_topbar_userbar',['userbar' => $this->userbar]);
    }
}