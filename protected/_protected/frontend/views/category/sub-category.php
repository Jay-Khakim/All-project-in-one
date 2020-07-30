<?php

use common\models\Banners;

$this->title =  $subCategory->title;
?>
<?php
$this->registerMetaTag([
    'name' => 'description',
    'content' => $subCategory->meta_description
  ]);
$this->registerMetaTag([
  'property' => 'og:type',
  'content' => 'website'
]);
$this->registerMetaTag([
  'property' => 'og:title',
  'content' => $subCategory->title
]);
$this->registerMetaTag([
  'property' => 'og:description',
  'content' => $subCategory->meta_description
]);
$this->registerMetaTag([
  'property' => 'og:url',
  'content' => toRoute(['/category/sub-category' , 'category' => $subCategory->subCategory->category->categoryTranslate->url , 'id' => $subCategory->url])
]);
$this->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);
$this->registerMetaTag([
  'property' => 'og:image',
  'content' => siteUrl().'uploads/category/'.$subCategory->subCategory->image
]);
$this->registerMetaTag([
  'name' => 'keywords',
  'content' => $subCategory->meta_keywords
]);
$this->registerMetaTag([
  'name' => 'robots',
  'content' => "index, follow"
]);

$this->registerLinkTag([
  'rel' => 'canonical',
  'href' => toRoute(['/category/sub-category' , 'category' => $subCategory->subCategory->category->categoryTranslate->url , 'id' => $subCategory->url])
]);

?>
<div class="container my-4 category-index">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 pl-md-0 order-2 order-md-0">
            <ul class="category-left d-none d-md-block">
                <?php foreach($categories as $category): ?>
                <li class="category-item px-3 dropright">
                    <a href="<?=toRoute(['/category/index' , 'id' => $category->categoryTranslate->url])?>" class=" d-flex justify-content-between align-items-center py-2">
                        <div class="d-flex align-items-center">
                            <img src="<?=siteUrl().'uploads/category/'.$category->icon?>" alt="">
                            <h5 class="pl-2"><?=$category->categoryTranslate->title?></h5>
                        </div>
                        <i class="fa fa-angle-right float-right"></i>
                    </a>
                    <div class="dropdown-menu category-menu p-3">
                        <div class="list">
                            <?php foreach($category->getSubCategories()->all() as $sub):?>
                            <div class="list-col">
                                <a class="dropdown-item" href="<?=toRoute(['/category/sub-category' , 'category' => $category->categoryTranslate->url , 'id' => $sub->subCategoryTranslate->url])?>"><?=$sub->subCategoryTranslate->title?></a>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
            
            <!-- Card -->
            <a href="<?=Banners::findOne(['page' => Banners::PAGE_SELECT_CATEGORY , 'position' => Banners::POSITION_TWO])->link?>">

                <div class="card card-image" style="height:250px;background-image: url(<?=siteUrl().'uploads/banners/'.Banners::findOne(['page' => Banners::PAGE_SELECT_CATEGORY , 'position' => Banners::POSITION_TWO])->image?>);">
                    <!-- Content -->
                    <!-- <div class="text-white font-weight-bold text-center justify-content-center d-flex align-items-center rgba-red-slight py-5 px-4">
                        <div class="rgba-red-light">
                            <p><?='product title'?></p>
                            <a class="btn rgba-red-strong text-white" href="#"><i class="fa fa-clone left"></i> <?=t("More")?></a>
                        </div>
                    </div> -->
    
                </div>
            </a>
            <!-- Card -->
        </div>
        <div class="col-12 col-md-8 col-lg-9 pr-md-0">
            <div class="banner-liner">
                
                <div class="banner1" style="background-image: url('<?=siteUrl().'uploads/banners/'.Banners::findOne(['page' => Banners::PAGE_SELECT_CATEGORY , 'position' => Banners::POSITION_ONE])->image?>');background-size:cover;background-position:center">
                <a style="height: 100%;width:100%;display:block;" href="<?=Banners::findOne(['page' => Banners::PAGE_SELECT_CATEGORY , 'position' => Banners::POSITION_ONE])->link?>">
                <div class="banner-body">
                    <h5 class="font-weight-bold"><?=''?></h5>
                    <!-- <a href="#" class="btn btn-outline-info p-2 px-4 waves-effect py-2">More</a> -->
                </div>
                    </a>
                    </div>
                <!-- <div class="banner2" style="background-image: url('<?=siteUrl().'themes/default/img/slider/3.png'?>');background-size:cover;background-position:center">
                    <div class="banner-body">
                        <h5 class="font-weight-bold"><?=''?></h5>
                        <a href="#" class="btn btn-outline-info p-2 px-4 waves-effect py-2">More</a>
                    </div>
                </div> -->
            </div>

            <div class="category-breadcrumb mt-3 py-1 px-3"><a href="<?=toRoute(['/'])?>"><?=t("Home")?></a> > <a href="<?=toRoute(['/category/index' , 'id' => $subCategory->subCategory->category->categoryTranslate->url])?>"> <?=$subCategory->subCategory->category->categoryTranslate->title?> </a> > <a href="#"><?=$subCategory->title?></a></div>

            <div class="category-products mt-3">
                <div class="row justify-content-start">
                    <?php foreach($models as $model):?>
                    <div class="col-6 wow fadeIn col-sm-6 col-md-6 col-lg-4 col-xl-4 mt-3">
                        <div class="card card-ecommerce">

                            <div class="view p-1 overlay">
                                <a href="<?=toRoute(['/product/view' , 'category' => $model->subCategory->category->categoryTranslate->url , 'sub_category' => $model->subCategory->subCategoryTranslate->url , 'id' => $model->productTranslate->url])?>">
                                    <img src="<?=siteUrl().'uploads/product/thumb/'.$model->image?>" class="img-fluid" alt="">
                                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-1">
                                    <strong>
                                        <a href="<?=toRoute(['/product/view' , 'category' => $model->subCategory->category->categoryTranslate->url , 'sub_category' => $model->subCategory->subCategoryTranslate->url , 'id' => $model->productTranslate->url])?>" class="dark-grey-text"><?=$model->productTranslate->title?></a>
                                    </strong>
                                </h5>
                                <div class="card-footer pb-0 px-0">
                                    <div class="row text-center">
                                        <div class="w-100">
                                        <a href="<?=toRoute(['/company/view' , 'type' => $model->company->type == \common\models\Company::TYPE_FOREIGN ? 'foreign' : 'local', 'id' => $model->company->companyTranslate->url])?>">
                                        <span style="font-size: 12px;"><?=$model->company->companyTranslate->title?></span>
                                        </a>
                                        </div>
                                        <span class="float-right mx-auto">
                                            <a href="<?=toRoute(['/product/view' , 'category' => $model->subCategory->category->categoryTranslate->url , 'sub_category' => $model->subCategory->subCategoryTranslate->url , 'id' => $model->productTranslate->url])?>" class="btn px-3 py-2"><?=t("More")?></a>
                                        </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <?php endforeach ?>
                </div>

                <h6 class="h6-responsive text-center my-4 font-weight-bold">
                    <?php if($allCount > 20): ?>
                    <a class="loading" data-subCategory="<?=$subCategory->sub_category_id?>">More</a>
                    <?php endif ?>
                </h6>
            </div>
        </div>
    </div>
</div>
<?php

$script = <<<JS

$('.loading').click(function(){
  $('.loading').text('Loading...');
  let productsCount = $('.category-products > div > div').length;
          let content = $('.category-products > div');
          let sub_category = $('.loading').data('subCategory');
          // console.log(productsCount);
              $.ajax({
                url: '/site/loading',
                type: 'GET',
                data: {
                  name: 'sub_category',
                  type: null,
                  count: productsCount,
                  sub_category: sub_category
                },
               
                success: function(res){
                 
                 //  console.log(res);
                  
                 content.append(res.partial);
   
                 if($('.category-products > div > div').length == res.allCount){
   
                   $('.loading').text('End');
                   $('.loading').removeClass('loading').addClass('loading-end');
                 }else{
                   $('.loading').text('More');
                 }
                }
              });
})

JS;

$this->registerJs($script , 3);
?>