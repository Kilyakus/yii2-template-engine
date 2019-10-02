<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!--begin: Cart -->
<div class="kt-header__topbar-item dropdown">
	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px">
		<span class="kt-header__topbar-icon"><i class="flaticon2-chat-2"></i></span>
		<span class="kt-badge kt-badge--success position-absolute kt-align-right">8</span>
	</div>
	<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
		<form>

			<!-- begin:: Mycart -->
			<div class="kt-mycart">
				<div class="kt-mycart__head kt-head" style="background-image: url(https://keenthemes.com/metronic/themes/metronic/theme/default/demo8/dist/assets/media/misc/bg-1.jpg);">
					<div class="kt-mycart__info">
						<span class="kt-mycart__icon"><i class="flaticon2-chat-2 kt-font-success"></i></span>
						<h3 class="kt-mycart__title">My Cart</h3>
					</div>
					<div class="kt-mycart__button">
						<button type="button" class="btn btn-success btn-sm" style=" ">2 Items</button>
					</div>
				</div>
				<div class="kt-mycart__body">
					<div class="kt-notification kt-scroll" style="max-height:200px;" data-scroll="true" data-mobile-height="200">
						<a href="/admin/user/info/1" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<img src="http://zmey/uploads/thumbs/da-c435b564ac812908bf271a2cd2b88243-ac441418d5b547c852ea2d93a9e7a308.png">
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									Мой Профиль						</div>
								<div class="kt-notification__item-time">
									Account settings and more
								</div>
							</div>
						</a>
						<a href="/admin/chat/message/chat" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<img src="http://zmey/uploads/thumbs/da-c435b564ac812908bf271a2cd2b88243-ac441418d5b547c852ea2d93a9e7a308.png">
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									Мои Сообщения						</div>
								<div class="kt-notification__item-time">
									Inbox and tasks
								</div>
							</div>
						</a>
						<a href="/admin/chat/message/chat" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<img src="http://zmey/uploads/thumbs/da-c435b564ac812908bf271a2cd2b88243-ac441418d5b547c852ea2d93a9e7a308.png">
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									Мои Сообщения						</div>
								<div class="kt-notification__item-time">
									Inbox and tasks
								</div>
							</div>
						</a>
						<a href="/admin/chat/message/chat" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<img src="http://zmey/uploads/thumbs/da-c435b564ac812908bf271a2cd2b88243-ac441418d5b547c852ea2d93a9e7a308.png">
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									Мои Сообщения						</div>
								<div class="kt-notification__item-time">
									Inbox and tasks
								</div>
							</div>
						</a>
					</div>
					
				</div>
				<div class="kt-mycart__footer kt-notification__custom kt-space-between">
					<div class="kt-mycart__button kt-align-right">
						<button type="button" class="btn btn-primary btn-sm">Открыть чат</button>
					</div>
				</div>
			</div>

			<!-- end:: Mycart -->
		</form>
	</div>
</div>

<!--end: Cart-->