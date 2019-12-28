<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<?php if($chat && !Yii::$app->user->isGuest) : ?>
<!--begin: Chat Counter -->
<div class="kt-header__topbar-item">
	<div class="kt-header__topbar-wrapper position-relative" data-toggle="modal" data-target="#kt_chat_modal">
		<span class="kt-header__topbar-icon"><i class="flaticon2-chat-2"></i></span>
		<span class="kt-badge kt-badge--success position-absolute" style="right:0;"><?= $chat['recent'] ?></span>
	</div>
</div>
<!--end: Chat Counter -->
<?php endif; ?>