<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- begin: Header Menu -->
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
	<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
		<ul class="kt-menu__nav ">
			<li class="kt-menu__item " aria-haspopup="true">
				<a href="<?= Url::toRoute(['/admin']) ?>" class="kt-menu__link "><span class="kt-menu__link-text"><i class="fa fa-desktop"></i>&nbsp;<?= Yii::t('easyii', 'Control Panel') ?></span></a>
			</li>
			<?php if(IS_FORUMMODER) : ?>
				<li class="kt-menu__item " aria-haspopup="true">
					<a href="<?= Url::toRoute(['/forum/admin']) ?>" class="kt-menu__link "><span class="kt-menu__link-text"><i class="fa fa-comments"></i>&nbsp;<?= Yii::t('forum/view', 'Forums') ?></span></a>
				</li>
			<?php endif; ?>
			<?php if(IS_ADMIN) : ?>
				<li class="kt-menu__item " aria-haspopup="true">
					<a href="<?= Url::toRoute(['/user/admin']) ?>" class="kt-menu__link "><span class="kt-menu__link-text"><i class="fa fa-users"></i>&nbsp;<?= Yii::t('user', 'Users') ?></span></a>
				</li>
			<?php endif; ?>
			<?php if(IS_ROOT) : ?>
				<li class="kt-menu__item " aria-haspopup="true">
					<a href="<?= Url::toRoute(['/admin/settings']) ?>" class="kt-menu__link "><span class="kt-menu__link-text"><i class="fa fa-cog"></i>&nbsp;<?= Yii::t('easyii', 'Settings') ?></span></a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>

<!-- end: Header Menu -->