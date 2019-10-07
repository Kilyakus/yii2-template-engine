<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!--begin: User card -->
<div class="kt-user-card-v2">
    <div class="kt-user-card-v2__pic"><img class="img-circle" src="<?= $user->avatar ?>"></div>
    <div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="<?= $url ?>" data-pjax="0"><?= Html::encode($user->username) ?></a>
    	<span class="kt-user-card-v2__desc"><?= array_values(Yii::$app->authManager->getPermissionsByUser($user->id))[0]->description ?></span>
    </div>
</div>
<!--end: User card -->