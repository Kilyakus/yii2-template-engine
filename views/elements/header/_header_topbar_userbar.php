<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!--begin: User bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">
	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px">
		<!-- <span class="kt-header__topbar-welcome kt-visible-desktop"><?= Yii::t('easyii','Welcome') ?>,</span> -->
		<!-- <span class="kt-header__topbar-username kt-visible-desktop"><?= Yii::$app->user->identity->name ?></span> -->
		<img alt="<?= Yii::$app->user->identity->name ?>" src="<?= Yii::$app->user->identity->profile->getAvatar(300) ?>">
		<span class="kt-header__topbar-icon kt-bg-brand kt-font-lg kt-font-bold kt-font-light kt-hidden">S</span>
		<span class="kt-header__topbar-icon kt-hidden"><i class="flaticon2-user-outline-symbol"></i></span>
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
			<!-- <a href="javascript://" class="kt-notification__item">
				<div class="kt-notification__item-icon">
					<i class="flaticon2-calendar-3 kt-font-success"></i>
				</div>
				<div class="kt-notification__item-details">
					<div class="kt-notification__item-title kt-font-bold">
						My Profile
					</div>
					<div class="kt-notification__item-time">
						Account settings and more
					</div>
				</div>
			</a>
			<a href="javascript://" class="kt-notification__item">
				<div class="kt-notification__item-icon">
					<i class="flaticon2-mail kt-font-warning"></i>
				</div>
				<div class="kt-notification__item-details">
					<div class="kt-notification__item-title kt-font-bold">
						My Messages
					</div>
					<div class="kt-notification__item-time">
						Inbox and tasks
					</div>
				</div>
			</a>
			<a href="javascript://" class="kt-notification__item">
				<div class="kt-notification__item-icon">
					<i class="flaticon2-rocket-1 kt-font-danger"></i>
				</div>
				<div class="kt-notification__item-details">
					<div class="kt-notification__item-title kt-font-bold">
						My Activities
					</div>
					<div class="kt-notification__item-time">
						Logs and notifications
					</div>
				</div>
			</a>
			<a href="javascript://" class="kt-notification__item">
				<div class="kt-notification__item-icon">
					<i class="flaticon2-hourglass kt-font-brand"></i>
				</div>
				<div class="kt-notification__item-details">
					<div class="kt-notification__item-title kt-font-bold">
						My Tasks
					</div>
					<div class="kt-notification__item-time">
						latest tasks and projects
					</div>
				</div>
			</a>
			<a href="javascript://" class="kt-notification__item">
				<div class="kt-notification__item-icon">
					<i class="flaticon2-cardiogram kt-font-warning"></i>
				</div>
				<div class="kt-notification__item-details">
					<div class="kt-notification__item-title kt-font-bold">
						Billing
					</div>
					<div class="kt-notification__item-time">
						billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
					</div>
				</div>
			</a> -->
			<div class="kt-notification__custom kt-space-between">
				<a href="<?= Url::toRoute(['/admin/sign/out']) ?>" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold"><?= Yii::t('easyii','Logout') ?></a>
				<!-- <a href="" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a> -->
			</div>
		</div>

		<!--end: Navigation -->
	</div>
</div>

<!--end: User bar -->