<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!--begin: Language bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--langs">
	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px">
		<span class="kt-header__topbar-icon">
			<img class="" src="<?= $baseUrl ?>/media/flags/<?= Yii::$app->language ?>.svg" alt="" />
		</span>
	</div>
	<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
		<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
			<li class="kt-nav__item<?= Yii::$app->language == 'ru' ? ' active' : ''; ?>">
				<a href="<?= Url::toRoute([ ''.Yii::$app->request->get()['id'], 'language' => 'ru']);?>" class="kt-nav__link">
					<span class="kt-nav__link-icon"><img src="<?= $baseUrl ?>/media/flags/ru.svg" alt="" /></span>
					<span class="kt-nav__link-text">Русский</span>
				</a>
			</li>
			<li class="kt-nav__item<?= Yii::$app->language == 'en' ? ' active' : ''; ?>">
				<a href="<?= Url::toRoute([ ''.Yii::$app->request->get()['id'], 'language' => 'en']); ?>" class="kt-nav__link">
					<span class="kt-nav__link-icon"><img src="<?= $baseUrl ?>/media/flags/en.svg" alt="" /></span>
					<span class="kt-nav__link-text">English</span>
				</a>
			</li>
		</ul>
	</div>
</div>
<!--end: Language bar -->