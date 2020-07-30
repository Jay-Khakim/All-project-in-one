<?php

use common\models\Banners;
use common\models\Company;

$this->title =  t("The first online showroom in Uzbekistan | UzbekMart.com");
?>
<?php
\Yii::$app->view->registerMetaTag([
  'name' => 'description',
  'content' => t("It is the first in Uzbekistan - an online showroom of the Association of Exporters of Uzbekistan.")
]);
\Yii::$app->view->registerMetaTag([
  'property' => 'og:type',
  'content' => 'website'
]);
\Yii::$app->view->registerMetaTag([
  'property' => 'og:title',
  'content' => t("The first online showroom in Uzbekistan | UzbekMart.com")
]);
\Yii::$app->view->registerMetaTag([
  'property' => 'og:description',
  'content' => t("It is the first in Uzbekistan - an online showroom of the Association of Exporters of Uzbekistan.")
]);
\Yii::$app->view->registerMetaTag([
  'property' => 'og:url',
  'content' => "http://uzbekmart.com"
]);
\Yii::$app->view->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);
\Yii::$app->view->registerMetaTag([
  'property' => 'og:image',
  'content' => 'http://uzbekmart.com/themes/default/img/logo/logo.png'
]);
\Yii::$app->view->registerMetaTag([
  'name' => 'keywords',
  'content' => t("Export , Import , e-commerce , Association , Trade , Tashkent , Online market , showroom , shopping , online store , online business , shopping cart")
]);
\Yii::$app->view->registerMetaTag([
  'name' => 'robots',
  'content' => "index, follow"
]);

\Yii::$app->view->registerLinkTag([
  'rel' => 'canonical',
  'href' => 'http://uzbekmart.com'
]);

?>
<div class="container">
    <!-- <ul class="quik-link">
        <span class="text-capitalize font-weight-bold">quik-link: </span>
        <li><a href="#">Category three</a></li>
        <li><a href="#">Category two</a></li>
        <li><a href="#">Category one</a></li>
    </ul> -->

    <!-- both companies -->
    <div class="row companies my-4 px-1 py-3">
        <div class="col-lg-6 col-sm-12">
            <div class="d-flex justify-content-between py-2">
                <span class="title-black"><?=t("Local companies")?></span>
                <a href="<?=toRoute(['/company/local'])?>" class="more-link"><?=t("More")?>...</a>
            </div>
            <div class="row p-1">
                <?php foreach($local as $index => $l):?>
                <div class="col-md-3 col-6 <?=$index == 4 ? 'd-md-block d-none' : ''?>"><a href="<?=toRoute(['/company/view' , 'type' => 'local' , 'id' => $l->companyTranslate->url])?>"><img src="<?=siteUrl().'uploads/company/thumb/'.$l->image?>" class="w-100"></a></div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="d-flex justify-content-between py-2">
                <span class="title-black"><?=t("Foreign companies")?></span>
                <a href="<?=toRoute(['/company/foreign'])?>" class="more-link"><?=t("More")?>...</a>
            </div>
            <div class="row p-1">
            <?php foreach($foreign as $index => $g):?>
                <div class="col-md-3 col-6 <?=$index == 4 ? 'd-md-block d-none' : ''?>"><a href="<?=toRoute(['/company/view' , 'type' => 'foreign' , 'id' => $g->companyTranslate->url])?>"><img src="<?=siteUrl().'uploads/company/thumb/'.$g->image?>" class="w-100"></a></div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- top products -->
    <div class="row top-products justify-content-center justify-content-md-start mb-5">
        <div class="col-12 col-md-9 border border-light py-2">


            <div class="d-flex justify-content-between">
                <span class="title-black"><?=t("Top products")?></span>
                <div class="d-inline-block">
                    <div class="owl-nav">
                        <a class="p-1 px-2 border border-light text-dark owl-prev" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="p-1 px-2 border border-light text-dark owl-next" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="owl-carousel py-3">
                        <?php foreach($products as $product):?>
                            <div class="card mb-2">
                                <a href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>"><img class="card-img-top" src="<?=siteUrl().'uploads/product/thumb/'.$product->image?>" alt="<?=$product->productTranslate->title?>"></a>
                                <div class="card-body">
                                    <a class="text-dark font-weight-bold" href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>"><span class="card-title font-weight-regular"><?=$product->productTranslate->title?></span></a>
                                    <p class="card-text"><?=$product->subCategory->subCategoryTranslate->title?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
            </div>
        </div>
        <div class="col-10 col-md-3 p-2">
            <a href="<?=Banners::findOne(['page' => Banners::PAGE_HOME , 'position' => Banners::POSITION_THREE])->link?>">
                <div class="card card-image" style="height:250px;background-image: url(<?=siteUrl().'uploads/banners/'.Banners::findOne(['page' => Banners::PAGE_HOME , 'position' => Banners::POSITION_THREE])->image?>);">
    
                    <!-- <div style="height: 100%;" class="text-white text-center d-flex justify-content-center align-items-center rgba-blue-light py-5 px-4">
                        <div>
                            <h4 class="card-title pt-2"><strong>here product title</strong></h4>
                            <a class="btn btn-deep-orange"><?=t("More")?></a>
                        </div>
                    </div> -->
                </div>
            </a>
        </div>

        <div class="col-12 banner-position-3 my-4">
            <a href="<?=Banners::findOne(['page' => Banners::PAGE_HOME , 'position' => Banners::POSITION_FOUR])->link?>"><img src="<?=siteUrl().'uploads/banners/'.Banners::findOne(['page' => Banners::PAGE_HOME , 'position' => Banners::POSITION_FOUR])->image?>" alt="" class="w-100"></a>
        </div>

        <div class="col-12 my-4">
            <span class="title-black"><?=t("All Products")?></span>
            <div class="row products py-2">
                <?php foreach($products as $product): ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="product-item mb-3">
                        <a href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>"><img class="card-img-top" src="<?=siteUrl().'uploads/product/thumb/'.$product->image?>" alt="<?=$product->productTranslate->title?>"></a>
                        <div class="card-body">
                            <a class="text-dark font-weight-bold" href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>"><span class="card-title font-weight-regular"><?=$product->productTranslate->title?></span></a>
                            <p class="card-text"><?=$product->subCategory->subCategoryTranslate->title?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <div class="d-flex w-100 justify-content-center"></a>
                    <?php if(count($products) != 0): ?>
                    <a href="<?=toRoute(['/product/index'])?>" class="more-link"><?=t("More")?>...</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-12">
            <span class="title-black"><?=t("Blogs")?></span>
            <div class="row blogs p-1">
                <?php foreach($blogs as $blog):?>
                <div class="col-6 col-md-4 col-lg-3 product-item p-3 mb-3">
                    <a href="<?=toRoute(['/blog/view' , 'id' => $blog->blogTranslate->url])?>">
                        <div class="p-1"> <img class="card-img-top" src="<?=siteUrl().'uploads/blog/thumb/'.$blog->image?>" alt="<?=$blog->blogTranslate->title?>"></div>
                    </a>
                    <a class="text-dark font-weight-bold" href="<?=toRoute(['/blog/view' , 'id' => $blog->blogTranslate->url])?>"><span class="card-title font-weight-regular"><?=$blog->blogTranslate->title?></span></a>
                    <p class=""> <?php $s = substr($blog->blogTranslate->description, 0, 130);
                        $result = substr($s, 0, strrpos($s, ' ')); echo $result. ' ...';?> </p>
                </div>
                <?php endforeach ?>
                <div class="d-flex w-100 justify-content-center">
                <?php if(count($blogs) != 0): ?>
                    <a href="<?=toRoute(['/blog/index'])?>" class="more-link"><?=t("More")?>...</a>
                <?php endif ?>
                </div>
            </div>
        </div>
    </div>

</div>