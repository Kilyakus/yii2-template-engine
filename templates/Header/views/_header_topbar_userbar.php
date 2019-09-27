<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kilyakus\web\widgets as Widget;
?>
<!--begin: User bar -->
<?php if(Yii::$app->user->isGuest) : ?>
	<?= Widget\Button::widget([
		'title' => Yii::t('easyii','Login'),
		'type' => 'transparent',
		'size' => Widget\Button::SIZE_LARGE,
		'options' => ['class' => 'ml-2', 'data-toggle' => 'modal', 'data-target' => '#loginForm'],
	]) ?>
<?php else: ?>
	<div class="kt-header__topbar-item kt-header__topbar-item--user">
		<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px">
			<img alt="<?= Yii::$app->user->identity->name ?>" src="<?= Yii::$app->user->identity->profile->getAvatar(300) ?>">
			<span class="kt-header__topbar-icon kt-bg-brand kt-font-lg kt-font-bold kt-font-light kt-hidden">S</span>
			<span class="kt-header__topbar-icon kt-hidden"><i class="flaticon2-user-outline-symbol"></i></span>
			<!-- <span class="kt-header__topbar-welcome kt-visible-desktop"><?= Yii::t('easyii','Welcome') ?>,</span> -->
			<span class="kt-header__topbar-username kt-visible-desktop"><?= Yii::$app->user->identity->profile->name ?></span>
		</div>
		<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

			<!--begin: Head -->
			<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
				<div class="kt-user-card__avatar">

					<img class="kt-hidden-" alt="<?= Yii::$app->user->identity->name ?>" src="<?= Yii::$app->user->identity->profile->getAvatar(300) ?>">

					<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
					<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
				</div>
				<div class="kt-user-card__name">
					<?= Yii::$app->user->identity->name ?>
				</div>
				<div class="kt-user-card__badge">
					<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">0 messages</span>
				</div>
			</div>

			<!--end: Head -->

			<!--begin: Navigation -->
			<div class="kt-notification">
				<a href="<?= Url::toRoute([(Yii::$app->controller->module->id == 'app' ? '/user' : '/admin/user/info'),'id' => Yii::$app->user->id]) ?>" class="kt-notification__item">
					<div class="kt-notification__item-icon">
						<i class="flaticon2-calendar-3 kt-font-success"></i>
					</div>
					<div class="kt-notification__item-details">
						<div class="kt-notification__item-title kt-font-bold">
							<?= Yii::t('easyii', 'My Profile') ?>
						</div>
						<div class="kt-notification__item-time">
							Account settings and more
						</div>
					</div>
				</a>
				<a href="<?= Url::toRoute([(Yii::$app->controller->module->id == 'app' ? '/user/connection/chat' : '/admin/chat/message/chat')]) ?>" class="kt-notification__item">
					<div class="kt-notification__item-icon">
						<i class="flaticon2-mail kt-font-warning"></i>
					</div>
					<div class="kt-notification__item-details">
						<div class="kt-notification__item-title kt-font-bold">
							<?= Yii::t('easyii', 'My Messages') ?>
						</div>
						<div class="kt-notification__item-time">
							Inbox and tasks
						</div>
					</div>
				</a>
				<div class="kt-notification__custom kt-space-between">
					<?= Widget\Button::widget([
						'tagName' => 'a',
						'title' => Yii::t('easyii','Logout'),
						'type' => Widget\Button::TYPE_BRAND,
						'size' => Widget\Button::SIZE_SMALL,
						'disabled' => false,
						'block' => false,
						'outline' => false,
						'hover' => false,
						'circle' => false,
						'label' => true,
						'upper' => false,
						'options' => ['href' => Url::toRoute(['/site/out'])],
					]) ?>
					<!-- <a href="" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a> -->
				</div>
			</div>

			<!--end: Navigation -->
		</div>
	</div>
<?php endif; ?>
<!--end: User bar -->