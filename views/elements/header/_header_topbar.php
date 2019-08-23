<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- begin:: Header Topbar -->
<div class="kt-header__topbar">

	<?= $this->render('_header_topbar_search') ?>

	<?php $this->render('_header_topbar_notifications') ?>

	<?php $this->render('_header_topbar_quickactions') ?>

	<?php $this->render('_header_topbar_cart') ?>

	<?= $this->render('_header_topbar_languagebar',compact('baseUrl')) ?>

	<?= $this->render('_header_topbar_userbar') ?>

	<?php $this->render('_header_topbar_quickpanel') ?>
</div>

<!-- end:: Header Topbar -->