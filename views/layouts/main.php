<?php

/** @var $this \yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use kilyakus\web\helpers\Layout;
use kilyakus\web\widgets\Menu;
use kilyakus\web\widgets\NavBar;
use kilyakus\web\widgets\Nav;
use kilyakus\web\widgets\Breadcrumbs;
use kilyakus\web\widgets\Button;
use kilyakus\web\widgets\HorizontalMenu;
use kilyakus\web\Engine;
use kilyakus\web\widgets\Badge;

\bin\admin\assets\SwitcherAsset::register($this);

$moduleName = $this->context->module->id;
$module = $this->context->module->module->id;
if($module == 'app'){
    $module = 'admin';
}

if(empty($nav)){
    $nav = [];
}
if($moduleName == 'forum'){
}else{
    foreach(Yii::$app->getModule('admin')->activeModules as $key => $activeModule){
        $activeClass = \bin\admin\components\API::getClass($activeModule->name,'api',$activeModule->name);
        if($moduleName == $activeModule->name){
            $value = Url::toRoute(['/' . $module . '/' . $activeModule->name]);
        }
        $nav[$key] = (object)['url' => Url::to(['/' . $module . '/' . $activeModule->name]), 'title' => Yii::t('easyii/'.$activeModule->name,$activeModule->title), 'icon' => $activeModule->icon, 'badge' => ['count' => $activeModule->notice, 'class' => 'kt-badge kt-badge--info kt-badge--wide']];
        if(class_exists($activeClass) && (method_exists($activeClass, 'api_cats') && count($activeClass::cats()))){
            $url = (
                Url::to() == Url::toRoute(['/' . $module . '/' .$activeModule->name. '/items/index','id' => Yii::$app->controller->actionParams['id']])
            ) || (
                Url::to() == Url::toRoute(['/' . $module . '/' .$activeModule->name. '/items/index'])
            ) || (
                Url::to() == Url::toRoute(['/' . $module . '/' .$activeModule->name. '/a/index','id' => Yii::$app->controller->actionParams['id']])
            ) || (
                Url::to() == Url::toRoute(['/' . $module . '/' .$activeModule->name. '/a/index'])
            ) || (
                Url::to() == Url::toRoute(['/' . $module . '/' .$activeModule->name])
            );
            $nav[$key]->children['categories'] = (object)['url' => Url::toRoute(['/' . $module . '/' . $activeModule->name]), 'title' => Yii::t('easyii','Categories'), 'icon' => 'list-alt'];
            foreach($activeClass::cats() as $c => $cat) {
                if(!$cat->parent){
                    $nav[$key]->children['categories']->children[] = (object)['url' => Url::toRoute(['/' . $module . '/' .$activeModule->name. '/items/index','id' => $cat->category_id]), 'title' => $cat->title, 'image' => $cat->icon];
                }
            }
        }
    }
}

$this->beginPage();
Engine::registerThemeAsset($this);
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <!-- begin::Head -->
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?= Html::csrfMetaTags() ?>
        <title><?= Yii::t('easyii', 'Control Panel') ?> - <?= Yii::t('easyii', Html::encode($this->title)) ?></title>
        <?php $this->head() ?>
    </head>
    <!-- end::Head -->
    
    <!-- begin::Body -->
    <body <?= Layout::getHtmlOptions('body') ?> >
        <?php $this->beginBody() ?>

        <?= $this->render('@kilyakus/web/views/elements/header/_header_mobile',['baseUrl' => $baseUrl]) ?>

        <!-- begin:: Page -->

        <?= $this->render('@kilyakus/web/views/elements/header/_header_mobile',['baseUrl' => $baseUrl]) ?>

        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                    <?= $this->render('@kilyakus/web/views/elements/header/_header',['baseUrl' => $baseUrl, 'title' => $title]) ?>

                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch">
                        <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
                            <div class="kt-container kt-container--fit  kt-container--fluid  kt-grid kt-grid--ver">

                                <?= $this->render('@kilyakus/web/views/elements/sidebars/_aside',['baseUrl' => $baseUrl, 'nav' => $nav]) ?>

                                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                                    <!-- begin:: Content -->
                                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


                                        <?= $this->render('@kilyakus/web/views/_alert') ?>
                                        
                                        <?= $content ?>

                                    </div>

                                    <!-- end:: Content -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= $this->render('@kilyakus/web/views/elements/footer/_footer',['baseUrl' => $baseUrl]) ?>
                </div>
            </div>
        </div>

        <!-- end:: Page -->
        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>
        <!-- end::Scrolltop -->

        <?= $this->render('@kilyakus/web/views/elements/sidebars/_toolbar',['baseUrl' => $baseUrl, 'nav' => $nav]) ?>

        <?php $this->endBody() ?>
    </body>
    <!-- end::Body -->
</html>
<?php $this->endPage() ?>