<?php

use common\models\Banners;

$this->title =  $productTranslate->title;
?>
<?php
$this->registerMetaTag([
    'name' => 'description',
    'content' => $productTranslate->meta_description
  ]);
$this->registerMetaTag([
  'property' => 'og:type',
  'content' => 'website'
]);
$this->registerMetaTag([
  'property' => 'og:title',
  'content' => $productTranslate->title
]);
$this->registerMetaTag([
  'property' => 'og:description',
  'content' => $productTranslate->meta_description
]);
$this->registerMetaTag([
  'property' => 'og:url',
  'content' => toRoute(['/product/view' , 'category' => $productTranslate->product->subCategory->category->categoryTranslate->url , 'sub_category' => $productTranslate->product->subCategory->subCategoryTranslate->url , 'id' => $productTranslate->url])
]);
$this->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);
$this->registerMetaTag([
  'property' => 'og:image',
  'content' => siteUrl().'uploads/product/'.$productTranslate->product->image
]);
$this->registerMetaTag([
  'name' => 'keywords',
  'content' => $productTranslate->meta_keywords
]);
$this->registerMetaTag([
  'name' => 'robots',
  'content' => "index, follow"
]);

$this->registerLinkTag([
  'rel' => 'canonical',
  'href' => toRoute(['/product/view' , 'category' => $productTranslate->product->subCategory->category->categoryTranslate->url , 'sub_category' => $productTranslate->product->subCategory->subCategoryTranslate->url , 'id' => $productTranslate->url])
]);

?>
<div class="container mt-4 single-post">
    <div class="row pb-4">
        <div class="col-12 col-md-4 col-lg-3 pl-md-0 order-2 order-md-0">
            <ul class="category-left d-none d-md-block">
                <?php foreach($subCategories as $sub): ?>
                <li class="category-item px-3 dropright">
                    <a href="<?=toRoute(['/category/sub-category' , 'category' => $sub->category->categoryTranslate->url , 'id' => $sub->subCategoryTranslate->url])?>" class=" d-flex justify-content-between align-items-center py-2">
                        <?=$sub->subCategoryTranslate->title?>
                    </a>
                </li>
               <?php endforeach ?>
            </ul>
            
            <a href="<?=Banners::findOne(['page' => Banners::PAGE_PRODUCT_VIEW , 'position' => Banners::POSITION_ONE])->link?>">

                <div class="left-banner card card-image" style="height:250px;background-image: url(<?=siteUrl().'uploads/banners/'.Banners::findOne(['page' => Banners::PAGE_PRODUCT_VIEW , 'position' => Banners::POSITION_ONE])->image?>);">
    
                    <!-- <div class="text-white font-weight-bold text-center d-flex align-items-center rgba-red-slight py-5 px-4">
                        <div class="rgba-red-light text-center w-100">
                            <a class="btn text-white p-1" href="#"><?=t("More")?></a>
                        </div>
                    </div> -->
    
                </div>
            </a>
        </div>
        <div class="col-12 col-md-8 col-lg-9 pr-md-0">

            <div class="category-breadcrumb mt-0 py-1 px-3">
                <a href="<?=toRoute(['/'])?>"><?=t("Home")?></a>
                >
                <a href="<?=toRoute(['/category/index' , 'id' => $productTranslate->product->subCategory->category->categoryTranslate->url])?>"><?=$productTranslate->product->subCategory->category->categoryTranslate->title?></a>
                >
                <a href="<?=toRoute(['/category/sub-category' , 'category' => $productTranslate->product->subCategory->category->categoryTranslate->url , 'id' => $productTranslate->product->subCategory->subCategoryTranslate->url])?>"><?=$productTranslate->product->subCategory->subCategoryTranslate->title?></a>
                >
                <a href="#"><?=$productTranslate->title?></a>
            </div>
            <section id="productDetails" class="pb-5 mt-3">
                <div class="card mt-4 hoverable">

                    <div class="row mt-5 ">
                        <div class="col-lg-6">
                            <div class="row mx-2">
                                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">

                                    <div class="carousel-inner text-center text-md-left" role="listbox">
                                        <?php if(count($productTranslate->product->getProductGalleries()->all()) == 0): ?>
                                            <div class="carousel-item active">
                                                <img src="<?=siteUrl().'uploads/product/'.$productTranslate->product->image?>" class="img-fluid">
                                            </div>
                                        <?php endif?>
                                        <?php foreach($productTranslate->product->getProductGalleries()->all() as $index => $item):?>
                                            
                                        <div class="carousel-item <?=$index == 0 ? 'active' : ''?>">
                                            <img src="<?=siteUrl().'uploads/product/'.$item->image?>" alt="First slide" class="img-fluid">
                                        </div>
                                        <?php endforeach ?>
                                    </div>

                                    <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>

                                </div>
                            </div>
                            <div class="row mb-4">

                                <div class="col-md-12">

                                    <div id="mdb-lightbox-ui">
                                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                                            <div class="pswp__bg"></div>

                                            <div class="pswp__scroll-wrap">

                                                <div class="pswp__container">
                                                    <div class="pswp__item"></div>
                                                    <div class="pswp__item"></div>
                                                    <div class="pswp__item"></div>
                                                </div>

                                                <div class="pswp__ui pswp__ui--hidden">

                                                    <div class="pswp__top-bar">

                                                        <div class="pswp__counter"></div>

                                                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                                                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                                                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>


                                                        <div class="pswp__preloader">
                                                            <div class="pswp__preloader__icn">
                                                                <div class="pswp__preloader__cut">
                                                                    <div class="pswp__preloader__donut">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                                    </button>

                                                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                                    </button>

                                                    <div class="pswp__caption">
                                                        <div class="pswp__caption__center"></div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="mdb-lightbox no-margin" data-pswp-uid="1">
                                    <?php foreach($productTranslate->product->getProductGalleries()->all() as $index => $item):?>
                                        <figure class="col-3 col-md-2">
                                            <a href="<?=siteUrl().'uploads/product/thumb/'.$item->image?>" data-size="1600x1067">
                                                <img src="<?=siteUrl().'uploads/product/thumb/'.$item->image?>" class="img-fluid">
                                            </a>
                                        </figure>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->
                        </div>
                        <div class="col-lg-5 mr-3 text-center text-md-left">
                            <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                                <strong><?=$productTranslate->title?> </strong>
                            </h2>

                            <h3 class="h3-responsive text-center text-md-left mb-3 ml-xl-0 ml-4">
                                <!-- <span class="red-text font-weight-bold">
                                                <strong>100 ming</strong>
                                            </span>
                                            <span class="grey-text">
                                                <small>
                                                    <s>50 ming</s>
                                                </small>
                                            </span> -->
                            </h3>

                            <p class="ml-xl-0 ml-4 short-description">
                                <?=$productTranslate->short_description?>
                            </p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Company")?>: </strong><?=$productTranslate->product->company->companyTranslate->title?></p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Phone")?>: </strong><?=$productTranslate->product->company->phone?></p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Website")?>: </strong><?=$productTranslate->product->company->website?></p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Address")?>: </strong><?=$productTranslate->product->company->companyTranslate->address?></p>

                        </div>
                    </div>

                </div>
                <!--News card-->

            </section>

            <div class="description my-3">
                <h4 class="h4-responsive"><?=t("Description")?></h4>
                <div class="card">
                    <div class="card-body">
                    <?=$productTranslate->product->productTranslate->description?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="similar-products border py-3 row my-4">

        <div class="col-12 controls-top d-flex align-items-center justify-content-between mb-0 px-3">
            <div class="carousel-title">
                <h5 class="font-weight-bold"><?=t("Similar products")?></h5>
            </div>
            <div class="controls-right owl-nav">
                <a class="btn btn-outline px-3 mx-0 owl-prev" href="javascript:0" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn btn-outline px-3 mx-0 owl-next" href="javascript:0" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div>
        </div>

        <div class="col-12 px-3">
            <div class="owl-carousel owl-theme owl-loaded">
                <?php foreach($similarProducts as $product): ?>
                <div>
                    <div class="card card-ecommerce">

                        <div class="view overlay">
                            <a href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>">
                                <img src="<?=siteUrl().'uploads/product/thumb/'.$product->image?>" class="img-fluid" alt="sample image">
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>

                        <div class="card-body">

                            <h5 class="card-title mb-2">
                                <strong>
                                    <a href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>" class="dark-grey-text"><?=$product->productTranslate->title?></a>
                                </strong>
                            </h5>
                            <strong class="dark-grey-text"><?=$product->company->companyTranslate->title?></strong>
                        </div>

                    </div>
                </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</div>