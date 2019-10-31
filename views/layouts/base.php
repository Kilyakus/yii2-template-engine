<?php
use yii\helpers\Url;
use yii\helpers\Html;

use kilyakus\web\Engine;
use kilyakus\web\helpers\Layout;

Engine::registerThemeAsset($this)->baseUrl;

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
		<head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?= Html::csrfMetaTags() ?>
        <title><?= Yii::t('easyii', 'Control Panel') ?> - <?= Yii::t('easyii', Html::encode($this->title)) ?></title>
        <?php $this->head() ?>
    </head>
		<body <?= Layout::getHtmlOptions('body') ?>>

				<?php $this->beginBody() ?>

            <?= $this->render('@kilyakus/web/views/_alert') ?>

            <div style="width:100%;height:100%;background-color:#FAFAFA;position:fixed;"></div>

            <div class="kt-grid kt-grid--hor kt-grid--root">
              <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                  <?= $content ?>
                </div>
              </div>
            </div>

						<!-- begin::Scrolltop -->
						<div id="kt_scrolltop" class="kt-scrolltop">
								<i class="fa fa-arrow-up"></i>
						</div>
						<!-- end::Scrolltop -->

            <?= $this->render('@kilyakus/web/views/elements/sidebars/_toolbar',['baseUrl' => $baseUrl, 'nav' => $nav]) ?>


				<?php $this->endBody() ?>

		</body>
</html>
<?php $this->endPage() ?>