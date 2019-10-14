<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kilyakus\widget\flag\Flag;
use kilyakus\web\widgets as Widget;

function langUrl($lang)
{
	return array_merge(Yii::$app->request->get(), ['language' => $lang]);
}
?>
<!--begin: Language bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--langs">
	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px">
		<span class="kt-header__topbar-icon">
			<?= Flag::widget(['flag' => Yii::$app->language]) ?>
		</span>
	</div>
	<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
		<?= Widget\Nav::widget([
			'encodeLabels' => false,
			'items' => [
				[
					'label' => '<span class="kt-nav__link-icon">' . Flag::widget(['flag' => Flag::FLAG_RU]) . '</span><span class="kt-nav__link-text">Русский</span>',
					'url' => langUrl('ru'),
					'active' => Yii::$app->language == 'ru',
				],
				[
					'label' => '<span class="kt-nav__link-icon">' . Flag::widget(['flag' => Flag::FLAG_EN]) . '</span><span class="kt-nav__link-text">English</span>',
					'url' => langUrl('en'),
					'active' => Yii::$app->language == 'en',
				]
			]
		]) ?>
	</div>
</div>
<!--end: Language bar -->