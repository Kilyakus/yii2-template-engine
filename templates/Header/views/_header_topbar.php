<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- begin:: Header Topbar -->
<div class="kt-header__topbar">

	<?= $this->render('_header_topbar_search') ?>

	<?php $this->render('_header_topbar_notifications') ?>

	<?php $this->render('_header_topbar_quickactions') ?>

	<?php $this->render('_header_topbar_cart') ?>
	
	<?= $this->render('_header_topbar_chat',['chat' => $topbar['chat']]) ?>

	<?= \kilyakus\web\templates\HeaderUserBar\UserBar::widget(['userbar' => $topbar['userbar']]) ?>

	<?php $this->render('_header_topbar_quickpanel') ?>

</div>

<?php if($topbar['chat'] && !Yii::$app->user->isGuest) : ?>
	<!--Begin:: Chat-->
	<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <?= \bin\admin\modules\chat\widgets\chat\ChatPrivate::widget([
	                'path' => $topbar['chat']['path'],
	                'id' => null,
	                'expand' => false,
	            ]) ?>
	        </div>
	    </div>
	</div>
	<!--ENd:: Chat-->
<?php endif; ?>

<!-- end:: Header Topbar -->