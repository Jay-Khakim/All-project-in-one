<?php

use common\models\Banners;
use common\models\Company;

$this->title =  $model->title;
?>
<?php
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->meta_description
  ]);
$this->registerMetaTag([
  'property' => 'og:type',
  'content' => 'website'
]);
$this->registerMetaTag([
  'property' => 'og:title',
  'content' => $model->title
]);
$this->registerMetaTag([
  'property' => 'og:description',
  'content' => $model->meta_description
]);
$this->registerMetaTag([
  'property' => 'og:url',
  'content' => toRoute(['company/view' , 'id' => $model->url , 'type' => Company::TYPE_FOREIGN == $model->company->type ? 'foreign' : 'local'])
]);
$this->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);
$this->registerMetaTag([
  'property' => 'og:image',
  'content' => siteUrl().'uploads/company/thumb/'.$model->company->image
]);
$this->registerMetaTag([
  'name' => 'keywords',
  'content' => $model->meta_keywords
]);
$this->registerMetaTag([
  'name' => 'robots',
  'content' => "index, follow"
]);

$this->registerLinkTag([
  'rel' => 'canonical',
  'href' => toRoute(['company/view' , 'id' => $model->url , 'type' => Company::TYPE_FOREIGN == $model->company->type ? 'foreign' : 'local'])
]);

?>
<div class="container mt-4 single-post single_company">
    <div class="row pb-4">
        <div class="col-12 col-md-4 col-lg-3 pl-md-0 order-2  pt-5 order-md-0">
           <a href="<?=Banners::findOne(['page' => Banners::PAGE_COMPANY_VIEW , 'position' => Banners::POSITION_ONE])->link?>">

               <div class="left-banner card card-image" style="height:250px;background-image: url('<?=siteUrl().'uploads/banners/'.Banners::findOne(['page' => Banners::PAGE_COMPANY_VIEW , 'position' => Banners::POSITION_ONE])->image?>');">
   
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
                <a href="<?=$model->company->type == common\models\Company::TYPE_FOREIGN ? toRoute(['/company/foreign']) : toRoute(['/company/local'])?>"><?=$model->company->type == \common\models\Company::TYPE_FOREIGN ? t('Foreign companies'): t('Local companies')?></a>
                >
                <a ><?=$model->title?></a>

            </div>
            <section id="productDetails" class="pb-5 mt-3">
                <div class="card mt-4 hoverable">

                    <div class="row mt-5 ">
                        <div class="col-lg-6">
                            <div class="row mx-2">
                                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">

                                    <div class="carousel-inner text-center text-md-left" role="listbox">
                                        <div class="carousel-item text-center active p-3" >
                                            <img style="width: calc(100% / 2 + 100px);" src="<?=siteUrl().'uploads/company/'.$model->company->image?>" alt="First slide" class="img-fluid">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->
                        </div>
                        <div class="col-lg-5 mr-3 text-center text-md-left">
                            <h3 class="h3-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                                <strong><?=$model->title?> </strong>
                            </h3>

                            <h3 class="h3-responsive text-center text-md-left mb-3 ml-xl-0 ml-4">

                            </h3>

                            <p class="ml-xl-0 ml-4 short-description">
                                
                            </p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Address")?>: </strong><?=$model->address?></p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Phone")?>: </strong><?=$model->company->phone?></p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Website")?>: </strong><?=$model->company->website ? $model->company->website : t("not available")?></p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Email")?>: </strong><?=$model->company->email?></p>

                        </div>
                    </div>

                </div>
                <!--News card-->

            </section>

            <div class="description my-3">
                <h4 class="h4-responsive"><?=t("Description")?></h4>
                <div class="card">
                    <div class="card-body">
                        <?=$model->description?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h5><?=t("Company products")?></h5>
    <div class="company-products row justify-content-center justify-content-md-start pb-4">
        <?php foreach($products as $product):?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-3">
            <div class="card card-ecommerce">

                <div class="view overlay p-2">
                    
                <a href="<?=toRoute(['/product/view' , 'category' =>$product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>">
                    <img src="<?=siteUrl().'uploads/product/thumb/'.$product->image?>" class="img-fluid" alt="<?=$product->productTranslate->title?>">
                        <div class="mask rgba-white-slight waves-effect waves-light"></div>
                    </a>
                </div>

                <div class="card-body">

                    <h5 class="card-title mb-1">
                        <strong>
                            <a href="<?=toRoute(['/product/view' , 'category' =>$product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>" class="dark-grey-text"><?=$product->productTranslate->title?></a>
                        </strong>
                    </h5>
                    <a href="<?=toRoute(['/product/view' , 'category' =>$product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>" class=""><?=t("More")?></a>
                </div>

            </div>
        </div>
        <?php endforeach ?>
    </div>

    <!-- <h5 class="text-center">Loading...</h5> -->
</div>