<?php

use common\models\Banners;

$this->title =  t("All kinds of products");
?>
<?php
$this->registerMetaTag([
    'name' => 'description',
    'content' => t("uzbekmart.com  online showroom enfolding all kinds of product")
  ]);
$this->registerMetaTag([
  'property' => 'og:type',
  'content' => 'website'
]);
$this->registerMetaTag([
  'property' => 'og:title',
  'content' => t("All kinds of products")
]);
$this->registerMetaTag([
  'property' => 'og:description',
  'content' => t("uzbekmart.com  online showroom enfolding all kinds of product")
]);
$this->registerMetaTag([
  'property' => 'og:url',
  'content' => toRoute(['/product/index'])
]);
$this->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);

$this->registerMetaTag([
    'property' => 'og:image',
    'content' => siteUrl().'themes/default/img/logo/logo.png'
  ]);

$this->registerMetaTag([
  'name' => 'keywords',
  'content' => t("Export , Import , e-commerce , Association , Trade , Tashkent , Online market , showroom , shopping , online store , online business , shopping cart")
]);
$this->registerMetaTag([
  'name' => 'robots',
  'content' => "index, follow"
]);

$this->registerLinkTag([
  'rel' => 'canonical',
  'href' => toRoute(['/product/index'])
]);

?>
<?php

$banner1 = Banners::findOne(['page' => Banners::PAGE_ALL_PRODUCTS , 'position' => Banners::POSITION_ONE]);

?>
<div class="container">
    <ul class="quik-link">
        <!-- <span class="text-capitalize font-weight-bold">quik-link: </span>
        <li><a href="#">Category three</a></li>
        <li><a href="#">Category two</a></li>
        <li><a href="#">Category one</a></li> -->
    </ul>

    <!-- top products -->
    <div class="row justify-content-center justify-content-md-start top-products mb-5">
        <div class="col-12 col-md-9 border border-light py-2">

            <div class="d-flex justify-content-between">
                <span class="title-black"><?=t("Top products")?></span>
                <div class="d-inline-block">
                    <div class="owl-nav">
                        <a class="p-1 px-2 border border-light text-dark customPrevBtn" href="" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="p-1 px-2 border border-light text-dark customNextBtn" href="" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="owl-carousel owl-theme owl-loaded py-3">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <?php foreach ($best as $product): ?>
                        <div class="owl-item">
                            <div class="col-12 col-md-3 mw-100">
                                <div class="card mb-2">
                                    <a href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>"><img class="card-img-top" src="<?=siteUrl().'uploads/product/'.$product->image?>" alt="image product"></a>
                                    <div class="card-body">
                                        <a class="text-dark font-weight-bold" href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>"><span class="card-title font-weight-regular"><?=$product->productTranslate->title?></span></a>
                                        <p class="card-text"><?=$product->subCategory->subCategoryTranslate->title?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 col-md-3 p-2">
          <a href="<?=$banner1->link?>">

            <div class="card card-image" style="height:250px;background-image: url(<?=siteUrl().'uploads/banners/'.$banner1->image?>);">

                <!-- <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                    <div>
                        <h4 class="card-title pt-2"><strong>This is the card title</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat</p>
                        <a class="btn btn-deep-orange"><?=t("More")?></a>
                    </div>
                </div> -->
            </div>
          </a>
        </div>

        <div class="col-12 my-4">
            <span class="title-black"><?=t("Other products")?></span>
            <div class="row products py-2">
                <?php foreach($products as $product): ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 wow fadeIn">
                    <div class="product-item mb-3">
                        <a href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>"><img class="card-img-top" src="<?=siteUrl().'uploads/product/'.$product->image?>" alt="<?=$product->productTranslate->title?>"></a>
                        <div class="card-body">
                            <a class="text-dark font-weight-bold" href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url])?>"><span class="card-title font-weight-regular"><?=$product->productTranslate->title?></span></a>
                            <p class="card-text"><?=$product->subCategory->subCategoryTranslate->title?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

                <div class="d-flex w-100 justify-content-center">
                  <?php if($allCount > 20): ?>
                    <a class="more-link loading">More</a>
                  <?php endif ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php

$script = <<<JS

$('.loading').click(function(){
  $('.loading').text('Loading...');
  let productsCount = $('.products > div').length;
          let content = $('.products');
          // console.log(productsCount);
              $.ajax({
                url: '/site/loading',
                type: 'GET',
                data: {
                  name: 'products',
                  type: null,
                  count: productsCount
                },
               
                success: function(res){
                 
                 //  console.log(res);
                  
                 content.append(res.partial);
   
                 if($('.products > div').length == res.allCount){
   
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