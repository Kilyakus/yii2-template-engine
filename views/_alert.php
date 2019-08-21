<?php
use yii\bootstrap\Alert;
use yii\widgets\Pjax;
?>

<?php if(!$module->enableFlashMessages) : ?>
    <div class="container">
        <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
            <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
            	
            	<?php $this->registerJs("
toastr.options = {
  'closeButton': true,
  'debug': false,
  'positionClass': 'toast-bottom-right',
  'onclick': null,
  'showDuration': '3500',
  'hideDuration': '3500',
  'timeOut': '5000',
  'extendedTimeOut': '1000',
  'showEasing': 'swing',
  'hideEasing': 'linear',
  'showMethod': 'fadeIn',
  'hideMethod': 'fadeOut'
}
toastr['".$type."']('".$message."')",yii\web\View::POS_READY); ?>
                <?php 
                // $this->registerJs("notify." .$type. "('" . $message . "');",yii\web\View::POS_READY);
                 ?>
            <?php endif ?>
        <?php endforeach ?>
    </div>
<?php endif ?>