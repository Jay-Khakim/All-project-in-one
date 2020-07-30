<?php

use common\models\Banners;
use common\models\Carousel;
use common\models\Category;
use common\models\Company;
use common\models\Lang;

$banner1 = Banners::findOne(['page' => Banners::PAGE_HOME , 'position' => Banners::POSITION_ONE]);
$banner2 = Banners::findOne(['page' => Banners::PAGE_HOME , 'position' => Banners::POSITION_TWO]);

$categories = Category::find()->where(['status' => true])->all();
$carousels = Carousel::find()->where(['status' => true])->orderBy('id desc')->all();
$langs = $langs = \common\models\Lang::find()->where('id != :current_id', [':current_id' => \common\models\Lang::getCurrent()->id])->all();

$activeLang = Lang::findOne(\Yii::$app->languageId);
// print_r($lang->url.'/'.Yii::$app->getRequest()->pathInfo);
// return;
?>

<div class="header">
    <div class="head-top px-md-0 px-2">
        <div class="container">
            <div class="row nav top">
                <span><?=t("Call center")?>: +99895 145 45 02 </span>

                <div class="dropdown">
                    <button class="btn btn-light d-none d-md-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $activeLang->name ?> <i class="flag-icon flag-icon-<?= $activeLang->url == 'en' ? 'gb' : $activeLang->url ?>"></i><i class="fa fa-angle-down pl-2"></i></button>
                    <button class="btn btn-light d-block d-md-none" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $activeLang->url ?> <i class="flag-icon flag-icon-<?= $activeLang->url == 'en' ? 'gb' : $activeLang->url ?>"></i><i class="fa fa-angle-down pl-2"></i></button>

                    <div class="dropdown-menu dropdown-orange">
                        <?php foreach ($langs as $lang) : ?>

                            <a class="dropdown-item" href="<?='/'. $lang->url . '/' . Yii::$app->getRequest()->pathInfo ?>"><i class="flag-icon flag-icon-<?= $lang->url == 'en' ? 'gb' : $lang->url ?>"></i> <?= $lang->name ?></a>
                        <?php endforeach ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row search justify-content-center align-items-center px-md-0 px-2 mx-auto my-3 my-md-0">
            <div class="col-xl-3 col-lg-4 col-12 logo p-0 ml-sm-auto mx-auto mx-md-0 mr-auto mr-md-none text-center">
                <a href="<?= toRoute(['/']) ?>"><img src="<?= siteUrl() . 'themes/default/img/logo/logo.png' ?>" class="img-fluid my-2 my-md-0" alt="uzbekmart.com"></a>
            </div>
            <div class="col-md-8 col-12 d-flex justify-content-between align-items-center mb-md-0">

                <i class="category-humburger  d-lg-none fa-2x fa fa-bars"></i>

                <div class="search-form w-75">
                    <form action="<?=toRoute(['search/result'])?>" method="GET" class="d-flex justify-content-center align-items-center">
                        <input type="text" name="text" placeholder="<?=t("Search product and company")?>...">
                        <button type="submit" class="btn pl-4 pb-3"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row category-slider px-md-0 px-2">
            <div class="slider-nav w-100 py-2 py-md-1">
                <ul class="menu mb-0">
                    <li class="dropdown category-nav">
                        <a  style="color: white;" data-toggle="dropdown"><span class="fa fa-bars"></span></a>
                        <div class="dropdown-menu dropdown-primary">
                            <div class="category-list w-100 d-flex flex-wrap">
                                <?php foreach ($categories as $category) : ?>
                                    <a class="dropdown-item" href="<?= toRoute(['/category/index', 'id' => $category->categoryTranslate ? $category->categoryTranslate->url : '']) ?>"><?= $category->categoryTranslate ? $category->categoryTranslate->title : t('not available') ?></a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a  class="text-white"><?=t("Companies")?> <i class="fa fa-angle-down pl-1"></i></a>
                        <ul class="position-absolute bg-white pt-1 pb-1 pl-0" style="z-index: 999;">
                            <li><a href="<?= toRoute(['company/local']) ?>" class="p-2 text-dark d-block"><?=t("Local Companies")?></a></li>
                            <li><a href="<?= toRoute(['company/foreign']) ?>" class="p-2 text-dark d-block"><?=t("Foreign Companies")?></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= toRoute(['service/index']) ?>" class="text-white"><?=t("Services")?></a>
                        <i class="fa fa-right"></i>
                    </li>
                    <li>
                        <a href="<?= toRoute(['blog/index']) ?>" class="text-white"><?=t("Blogs")?></a>
                        <i class="fa fa-right"></i>
                    </li>
                    <li class="about-link">
                        <a href="<?= toRoute(['site/about']) ?>" class="text-white"><?=t("About")?></a>
                        <i class="fa fa-right"></i>
                    </li>
                    <li>
                        <a href="<?= toRoute(['site/contact']) ?>" class="text-white"><?=t("Contact")?></a>
                        <i class="fa fa-right"></i>
                    </li>
                </ul>
            </div>
            <?php if (\Yii::$app->controller->id == 'site' && \Yii::$app->controller->action->id == 'index') : ?>
                <div class="wrap row ml-0 mt-0 border">
                    <div class="col-md-5 col-lg-4 col-xl-3 d-md-block d-none categories px-0">
                        <ul class="category-list w-100">
                            <?php foreach ($categories as $category) : ?>
                                <li class="clearfix py-1" style="cursor:pointer"><a href="<?= toRoute(['/category/index', 'id' =>  $category->categoryTranslate ? $category->categoryTranslate->url : '']) ?>"><img class="img-fluid" src="<?= siteUrl() . 'uploads/category/' . $category->icon ?>" alt="" class="mr-3"><span class="ml-1"><?= $category->categoryTranslate ? $category->categoryTranslate->title : t('not available') ?></span></a>
                                    <i class="fa fa-chevron-right float-right"></i>
                                    <div class="category-sub">
                                        <div class="row justify-content-start">
                                            <?php foreach ($category->getSubCategories()->all() as $sub) : ?>
                                                <div class=""><a href="<?=toRoute(['category/sub-category','category' => $category->categoryTranslate ? $category->categoryTranslate->url : '' ,'id' => $sub->subCategoryTranslate->url]) ?>"><?= $sub->subCategoryTranslate->title ?></a> </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-7 col-lg-8 col-xl-7 slider px-0">
                        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php foreach ($carousels as $index => $carousel) : ?>
                                    <li data-target="#carousel-example-1z" data-slide-to="<?= $index ?>" class="<?= $index == 0 ? 'active' : '' ?>"></li>
                                <?php endforeach ?>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <?php foreach ($carousels as $index => $carousel) : ?>
                                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                                        <img class="mh-100 img-fluid" src="<?= siteUrl() . 'uploads/carousel/' . $carousel->image ?>" alt="<?= $carousel->carouselTranslate->title ?>">
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-2 right-both-banner">
                        <div class="row">
                            <div class="col-6 col-xl-12"><a href="<?=$banner1->link?>"><img src="<?=siteUrl().'uploads/banners/'.$banner1->image?>" alt="banner position one"></a></div>
                            <div class="col-6 col-xl-12"><a href="<?=$banner2->link?>"><img src="<?=siteUrl().'uploads/banners/'.$banner2->image?>" alt="banner position two"></a></div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<!-- mobile  category -->
<div class="mobile-category">
    <div class="category-close d-flex justify-content-end p-3">
        <i class="fa fa-times fa-2x"></i>

    </div>
    <hr>
    <div class="category-main">
        <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
        <?php foreach($categories as $category):?>
            <div class="card">

                <!-- Card header -->
                <div class="card-header py-0" role="tab" id="headingTwo1<?=$category->id?>">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1<?=$category->id?>" aria-expanded="false" aria-controls="collapseTwo1<?=$category->id?>">
                        <h5 class="mb-0 text-dark py-2 d-flex justify-content-between align-items-center">
                            <div>
                                <img src="<?=siteUrl().'uploads/category/'.$category->icon?>" >
                                <span><?=$category->categoryTranslate ? $category->categoryTranslate->title : t('not available')?></span>
                            </div>

                            <i class="fa fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo1<?=$category->id?>" class=" collapse" role="tabpanel" aria-labelledby="headingTwo1<?=$category->id?>" data-parent="#accordionEx1" style="">
                    <div class="card-body text-dark">
                        <ul class="list-group">
                            <?php foreach($category->getSubCategories()->all() as $index => $sub):?>
                            <li class="list-group-item py-1 <?=$index == 0 ? 'active' : ''?>">
                                <a href="<?=toRoute(['/category/sub-category' , 'category' => $sub->category->categoryTranslate->url , 'id' => $sub->subCategoryTranslate->url])?>">
                                    <div class="md-v-line"></div>
                                    <?=$sub->subCategoryTranslate->title?>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
        </div>
    </div>
</div>