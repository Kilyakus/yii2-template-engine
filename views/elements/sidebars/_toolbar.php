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
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="<?= Yii::t('easyii','Clear assets') ?>" data-placement="left">
        <a href="<?= Url::toRoute(['/system/default/clear-assets']) ?>"><i class="fa fa-trash-alt"></i></a>
    </li>
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
        <a href="javascript://" data-toggle="modal" data-target="#kt_chat_modal"><i class="fa fa-comments"></i></a>
    </li>
</ul>

<!-- end::Sticky Toolbar -->

<!--Begin:: Chat-->
<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= \bin\admin\modules\chat\widgets\chat\ChatPrivate::widget([
                'path' => Url::toRoute([IS_MODER ? '/admin/chat/message' : '/user/connection']),
                'id' => null,
                'expand' => false,
            ]) ?>
      
        </div>
    </div>
</div>

<!--ENd:: Chat-->
<?php endif; ?>