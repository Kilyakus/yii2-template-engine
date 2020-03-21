<?php
use yii\helpers\Url;
use yii\helpers\Html;
use bin\admin\modules\feedback\api\Feedback;
use kilyakus\widget\modal\Modal;
\kilyakus\widget\modal\ModalAsset::register($this);
?>
<!-- begin:: Footer -->
<div class="kt-footer  kt-grid__item" id="kt_footer">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-footer__wrapper">
			<div class="kt-footer__copyright kt-shape-font-color-4">
				2020&nbsp;&copy;&nbsp;<a href="<?= Url::toRoute(['/']) ?>" target="_blank" class="kt-link kt-shape-font-color-4">Zmey.ru</a>
			</div>

			<?php Modal::begin([
				'id' => 'feedbackForm',
				'toggleButton' => [
					'type' => 'secondary',
					'title' => Yii::t('easyii','Feedback'),
					'class' => 'btn-elevate btn-pill'
				],
				'header' => Yii::t('easyii', 'Feedback'),
				'pluginOptions' => [
					'autoOpen' => false,
                    'width' => 450,
                    'height' => 'auto',
                    'modal' => true,
                    'resizable' => true,
                    'draggable' => true,
                    'stack' => true,
				],
			]);
			?>
				<?= Feedback::form() ?>
			<?php Modal::end(); ?>
			<div class="kt-footer__menu">
				<a href="<?= Url::toRoute(['/agreements','name' => 'user-agreement']) ?>" target="_blank" class="kt-link kt-shape-font-color-4">Пользовательское соглашение</a>
			</div>
		</div>
	</div>
</div>
<!-- end:: Footer -->