<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- begin:: Footer -->
<div class="kt-footer  kt-grid__item" id="kt_footer">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-footer__wrapper">
			<div class="kt-footer__copyright">
				2019&nbsp;&copy;&nbsp;<a href="<?= Url::toRoute(['/']) ?>" target="_blank" class="kt-link">Zmey.ru</a>
			</div>
			<div class="kt-footer__menu">
				<a href="<?= Url::toRoute(['/agreements','name' => 'user-agreement']) ?>" target="_blank" class="kt-link">Пользовательское соглашение</a>
			</div>
		</div>
	</div>
</div>
<!-- end:: Footer -->