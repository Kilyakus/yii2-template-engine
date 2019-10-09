<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- begin:: Brand -->
<div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
	<div class="kt-header__brand-logo">
		<a href="<?= Url::toRoute(['/']) ?>">
			<span class="kt-header__brand-logo-default kt-shape-font-color-1 fa-2x">Zmey.ru</span>
			<span class="kt-header__brand-logo-sticky kt-shape-font-color-4 fa-2x">Zmey.ru</span>
		</a>
	</div>
	<div class="kt-header__topbar hidden-xs">
		<?= $this->render('_header_topbar_languagebar',compact('baseUrl')) ?>
	</div>
</div>
<!-- end:: Brand -->