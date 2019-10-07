<?php
namespace kilyakus\web\templates\UserCard;

use Yii;

class UserCard extends \yii\bootstrap\Widget
{
	public $id;

	public $url;

    public function run()
    {
        UserCardAsset::register($this->getView());

        $className = Yii::$app->getModule('user')->modelMap['User'];

        $user = $className::findOne($this->id);

        return $this->render('_usercard',['user' => $user, 'url' => $this->url]);
    }
}