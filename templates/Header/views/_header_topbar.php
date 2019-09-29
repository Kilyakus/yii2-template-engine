<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- begin:: Header Topbar -->
<div class="kt-header__topbar">

	<?php $this->render('_header_topbar_notifications') ?>

	<?php $this->render('_header_topbar_quickactions') ?>

	<?php $this->render('_header_topbar_cart') ?>

	<?= $this->render('_header_topbar_languagebar',compact('baseUrl')) ?>

	<?= \kilyakus\web\templates\HeaderUserBar\UserBar::widget(['userbar' => $topbar['userbar']]) ?>

	<?php $this->render('_header_topbar_quickpanel') ?>
</div>

<!-- end:: Header Topbar -->