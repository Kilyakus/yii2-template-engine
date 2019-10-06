<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed <?= isset($options['class']) ? $options['class'] : ''; ?>" data-ktheader-minimize="on">
	<div class="kt-header__top">
		<div class="kt-container  kt-container--fluid ">

			<?= $this->render('_header_brand',compact('title')) ?>

			<?= $this->render('_header_topbar',compact('topbar')) ?>
		</div>
	</div>
	<?php if($menu['adminPanel'] === true) : ?>
		<div class="kt-header__bottom">
			<div class="kt-container  kt-container--fluid ">
				<?= $this->render('_header_menu') ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<!-- end:: Header -->