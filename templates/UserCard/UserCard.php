<?php
namespace kilyakus\web\templates\UserCard;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

class UserCard extends \yii\bootstrap\Widget
{
	public $id;

	public $url;

	public function run()
	{
		UserCardAsset::register($this->getView());

		$className = Yii::$app->getModule('user')->modelMap['User'];

		$user = $className::findOne($this->id);

		echo "<!-- begin:: Templates/UserCard v2 -->";

		echo Html::beginTag('div',['class' => 'kt-user-card-v2']);

			echo Html::beginTag('div',['class' => 'kt-user-card-v2__pic']);

				echo Html::img($user->avatar,['class' => 'img-circle']);

			echo Html::endTag('div');

			echo Html::beginTag('div',['class' => 'kt-user-card-v2__details']);

				echo isset($this->url)

					? Html::a(Html::encode($user->username), $this->url, ['class' => 'kt-user-card-v2__name', 'data-pjax' => '0'])

					: Html::tag('span', Html::encode($user->username), ['class' => 'kt-user-card-v2__name']);

				echo Html::tag('span', array_values(Yii::$app->authManager->getPermissionsByUser($user->id))[0]->description, ['class' => 'kt-user-card-v2__desc']);

			echo Html::endTag('div');

		echo Html::endTag('div');

		echo "<!-- end:: Templates/UserCard v2 -->";
	}
}