<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kilyakus\web\widgets as Widget;
use kilyakus\widget\scrollbar\Scrollbar;
?>
<!--begin: User bar -->
<?php if(Yii::$app->user->isGuest) : ?>
	<?= Widget\Button::widget([
		'icon' => 'la la-user',
		'type' => 'transparent',
		'size' => Widget\Button::SIZE_LARGE,
		'circle' => true,
		'options' => [
			'class' => 'btn-icon border-0', 
			'data-toggle' => 'modal', 
			'data-target' => '#loginForm'
		],
	]) ?>
<?php else: ?>
	<div class="kt-header__topbar-item kt-header__topbar-item--user">
		<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px">
			<img alt="<?= Yii::$app->user->identity->name ?>" src="<?= Yii::$app->user->identity->getAvatar(300) ?>">
			<span class="kt-header__topbar-icon kt-bg-brand kt-font-lg kt-font-bold kt-font-light kt-hidden">S</span>
			<span class="kt-header__topbar-icon kt-hidden"><i class="flaticon2-user-outline-symbol"></i></span>
			<!-- <span class="kt-header__topbar-welcome kt-visible-desktop"><?= Yii::t('easyii','Welcome') ?>,</span> -->
			<span class="kt-header__topbar-username kt-visible-desktop"><?= Yii::$app->user->identity->profile->name ?></span>
		</div>
		<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

			<!--begin: Head -->
			<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
				<div class="kt-user-card__avatar">

					<img class="kt-hidden-" alt="<?= Yii::$app->user->identity->name ?>" src="<?= Yii::$app->user->identity->getAvatar(300) ?>">

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
				
				<?php if(count($userbar['items'])) : ?>
					<?php Scrollbar::begin([
						'maxHeight' => '55vh',
						'options' => [
							'class' => 'kt-notification',
						]
					]); ?>
					<!-- <div class="kt-notification" data-scroll="true" style="max-height: 55vh; overflow: hidden;"> -->
						<?php foreach ($userbar['items'] as $item) : ?>
							<?php if($item['visible'] == true) : ?>
								<a href="<?= $item['url'] ?>" class="kt-notification__item">
									<div class="kt-notification__item-icon">
										<i class="<?= $item['icon'] ?> <?= $item['iconOptions']['class'] ?>"></i>
									</div>
									<div class="kt-notification__item-details">
										<div class="kt-notification__item-title kt-font-bold">
											<?= $item['label'] ?>
										</div>
										<div class="kt-notification__item-time">
											<?= $item['description'] ?>
										</div>
									</div>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					<!-- </div> -->
					<?php Scrollbar::end(); ?>
				<?php endif; ?>

				<div class="kt-notification">
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