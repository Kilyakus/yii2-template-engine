<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
	<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Exclusive Datatable Plugin
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="dropdown dropdown-inline">
				<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="flaticon-more-1"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">

					<!--begin::Nav-->
					<ul class="kt-nav">
						<li class="kt-nav__head">
							Export Options
							<span data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect id="bound" x="0" y="0" width="24" height="24" />
										<circle id="Oval-5" fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
										<rect id="Rectangle-9" fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
										<rect id="Rectangle-9-Copy" fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
									</g>
								</svg> </span>
						</li>
						<li class="kt-nav__separator"></li>
						<li class="kt-nav__item">
							<a href="javascript://" class="kt-nav__link">
								<i class="kt-nav__link-icon flaticon2-drop"></i>
								<span class="kt-nav__link-text">Activity</span>
							</a>
						</li>
						<li class="kt-nav__item">
							<a href="javascript://" class="kt-nav__link">
								<i class="kt-nav__link-icon flaticon2-calendar-8"></i>
								<span class="kt-nav__link-text">FAQ</span>
							</a>
						</li>
						<li class="kt-nav__item">
							<a href="javascript://" class="kt-nav__link">
								<i class="kt-nav__link-icon flaticon2-link"></i>
								<span class="kt-nav__link-text">Settings</span>
							</a>
						</li>
						<li class="kt-nav__item">
							<a href="javascript://" class="kt-nav__link">
								<i class="kt-nav__link-icon flaticon2-new-email"></i>
								<span class="kt-nav__link-text">Support</span>
								<span class="kt-nav__link-badge">
									<span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
								</span>
							</a>
						</li>
						<li class="kt-nav__separator"></li>
						<li class="kt-nav__foot">
							<a class="btn btn-label-danger btn-bold btn-sm" href="javascript://">Upgrade plan</a>
							<a class="btn btn-clean btn-bold btn-sm" href="javascript://" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
						</li>
					</ul>

					<!--end::Nav-->
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body kt-portlet__body--fit">

		<!--begin: Datatable -->
		<div class="kt-datatable" id="kt_datatable_latest_orders"></div>

		<!--end: Datatable -->
	</div>
</div>