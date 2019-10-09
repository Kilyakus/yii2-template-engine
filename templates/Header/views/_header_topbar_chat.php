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

<!--Begin:: Chat-->
<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= \bin\admin\modules\chat\widgets\chat\ChatPrivate::widget([
                'path' => $chat['path'],
                'id' => null,
                'expand' => false,
            ]) ?>
      
        </div>
    </div>
</div>

<!--ENd:: Chat-->
<?php endif; ?>