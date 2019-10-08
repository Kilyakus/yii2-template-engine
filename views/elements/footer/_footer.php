<?php
use yii\helpers\Url;
use yii\helpers\Html;
use bin\admin\modules\feedback\api\Feedback;
use yii\bootstrap\Modal;
?>
<!-- begin:: Footer -->
<div class="kt-footer  kt-grid__item" id="kt_footer">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-footer__wrapper">
			<div class="kt-footer__copyright">
				2019&nbsp;&copy;&nbsp;<a href="<?= Url::toRoute(['/']) ?>" target="_blank" class="kt-link">Zmey.ru</a>
			</div>
             
<?php Modal::begin([
    'toggleButton' => [
        'label' => Yii::t('easyii','Обратная связь'),
        'class' => 'btn btn-secondary btn-elevate btn-pill'
    ],
    'id' => 'feedbackForm',
    'headerOptions' => ['class' => 'hidden'],
    // 'bodyOptions' => ['class' => 'modal-tabs']
]);
?>
<?= Feedback::form() ?>
<?= Html::submitButton('',['class' => 'close', 'data-dismiss' => 'modal', 'aria-hidden' => 'true']) ?>
<?php Modal::end(); ?>
			<div class="kt-footer__menu">
				<a href="<?= Url::toRoute(['/agreements','name' => 'user-agreement']) ?>" target="_blank" class="kt-link">Пользовательское соглашение</a>
			</div>
		</div>
	</div>
</div>
<!-- end:: Footer -->