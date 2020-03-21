<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kilyakus\web\widgets as Widget;
?>
<?php if(IS_ADMIN) : ?>
<!-- begin::Sticky Toolbar -->
<ul class="kt-sticky-toolbar" style="margin-top: 30px;">
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip" title="<?= Yii::t('easyii','Flush cache') ?>" data-placement="left">
        <a href="<?= Url::toRoute(['/system/default/flush-cache']) ?>"><i class="fa fa-bolt"></i></a>
    </li>
    <?php if(IS_ROOT) : ?>
	    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="<?= Yii::t('easyii','Clear assets') ?>" data-placement="left">
	        <a href="<?= Url::toRoute(['/system/default/clear-assets']) ?>"><i class="fa fa-trash-alt"></i></a>
	    </li>
	<?php endif; ?>
</ul>
<!-- end::Sticky Toolbar -->
<?php endif; ?>