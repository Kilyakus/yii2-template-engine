<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
	<div class="kt-header-mobile__logo">
		<a href="<?= Url::toRoute(['/']) ?>">
			<span class="fa-2x">Zmey.ru</span>
		</a>
	</div>
	<div class="kt-header-mobile__toolbar">
		<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon2-search-1"></i></button>

		<?php if($topbar['chat'] && !Yii::$app->user->isGuest) : ?>
			<div class="kt-header__topbar-item" id="kt_header_mobile_topbar_chat">
				<div class="kt-header__topbar-wrapper position-relative" data-toggle="modal" data-target="#kt_chat_modal">
					<span class="kt-header__topbar-icon"><i class="flaticon2-chat-2"></i></span>
					<span class="kt-badge kt-badge--success position-absolute" style="right:-7px;top:-7px;"><?= $topbar['chat']['recent'] ?></span>
				</div>
			</div>
		<?php endif; ?>
		<div id="kt_header_mobile_topbar_userbar">
			<?= \kilyakus\web\templates\HeaderUserBar\UserBar::widget(['userbar' => $topbar['userbar']]) ?>
		</div>
		<button style="display:none;" class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
		<button style="display:none;" class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
	</div>
</div>
<script>
$(document).ready(function(){
	
	if($('#kt_aside_menu_wrapper').length || $('#kt_header_menu_wrapper').length){
		$('#kt_header_mobile_topbar_chat').hide();
		$('#kt_header_mobile_topbar_userbar').hide();
	}
	if($('#kt_aside_menu_wrapper').length){
		$('#kt_aside_mobile_toggler').show();
	}
	if($('#kt_header_menu_wrapper').length){
		$('#kt_header_mobile_toggler').show();
	}
})
</script>
<!-- end:: Header Mobile -->