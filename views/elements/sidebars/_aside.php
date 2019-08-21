<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kilyakus\web\widgets\Menu;
?>
<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop">

	<!-- begin:: Aside Menu -->
	<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid">
		<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
			<?= app\widgets\DropList\DropList::widget([
				'theme' => 'black',
				'data' => $nav,
				'value' => Yii::$app->controller->actionParams['id'],
				'activeParents' => true,
				'generalAlwaysOpen' => false,
				'iconsLibrary' => '',
				'split' => 1,
			]) ?>
		</div>
	</div>

	<!-- end:: Aside Menu -->
</div>

<!-- end:: Aside -->