<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kilyakus\web\widgets\Breadcrumbs;
use bin\admin\components\API;
use kilyakus\imageprocessor\Preloader;
use bin\admin\modules\page\api\Page;
use bin\admin\modules\chat\api\Chat;
use kilyakus\web\templates\Header\Header;

use kilyakus\web\Engine;

$baseUrl = Engine::registerThemeAsset($this)->baseUrl;
$moduleName = $this->context->module->id;
$module = $this->context->module->module->id;
if($module == 'app'){
    $module = 'admin';
}

$page = Page::get('page-admin');

$value = null;

$title = ($page ? ($page->model->attributes['page_id'] ? '' : $page->seo('title',$page->title) . ' ') : '') . $this->title;

if(empty($nav)){
    $nav = [];
}
if($moduleName == 'forum'){
}elseif($moduleName == 'system'){
    $nav['translations'] = (object)['url' => Url::to(['/system/translations']), 'title' => Yii::t('easyii', 'Translations'), 'icon' => 'fa fa-language'];
    $nav['modules'] = (object)['url' => Url::to(['/system/modules']), 'title' => Yii::t('easyii', 'Modules'), 'icon' => 'fa fa-archive'];
    $nav['settings'] = (object)['url' => Url::to(['/system/settings']), 'title' => Yii::t('easyii', 'Settings'), 'icon' => 'fa fa-cog'];
}else{
    foreach(Yii::$app->getModule('admin')->activeModules as $key => $activeModule){
        $activeClass = API::getClass($activeModule->name,'api',$activeModule->name);
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
            $value = !$url ?: $key; 
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
?>

<?php $this->beginContent('@kilyakus/web/views/layouts/base.php'); ?>

    <?= Header::widget([
        'menu' => [
            'adminPanel' => true
        ],
        'topbar' => [
            'chat' => [
                'recent' => Chat::noAnswer(),
                'path' => '/admin/chat/message',
            ],
            'userbar' => [
                'items' => [
                    [
                        'label' => Yii::t('easyii', 'My Profile'),
                        'description' => Yii::t('easyii', 'Account settings and more'),
                        'url' => Url::toRoute(['/admin/user/info', 'id' => Yii::$app->user->id]),
                        'icon' => 'fa fa-home',
                        'iconOptions' => [
                            'class' => 'kt-label-font-color-2',
                        ],
                        'visible' => true,
                    ],
                    [
                        'label' => Yii::t('easyii', 'My Messages'),
                        'description' => Yii::t('easyii', 'Inbox and tasks'),
                        'url' => Url::toRoute(['/admin/chat/message/chat']),
                        'icon' => 'fa fa-envelope',
                        'iconOptions' => [
                            'class' => 'kt-label-font-color-2',
                        ],
                        'visible' => true,
                    ],
                ]
            ]
        ]
    ]) ?>

    <!-- begin:: Page -->

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

<?php $this->endContent(); ?>