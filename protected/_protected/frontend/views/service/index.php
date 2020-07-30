<?php

$this->title =  t("Services | UzbekMart.com");
?>
<?php
$this->registerMetaTag([
    'name' => 'description',
    'content' => t("The available types of service, quality and reliable in uzbekmart.com")
  ]);
$this->registerMetaTag([
  'property' => 'og:type',
  'content' => 'website'
]);
$this->registerMetaTag([
  'property' => 'og:title',
  'content' => t("Services | UzbekMart.com")
]);
$this->registerMetaTag([
  'property' => 'og:description',
  'content' => t("The available types of service, quality and reliable in uzbekmart.com")
]);
$this->registerMetaTag([
  'property' => 'og:url',
  'content' => toRoute(['/service/index'])
]);
$this->registerMetaTag([
  'property' => 'og:image',
  'content' => siteUrl().'themes/default/img/logo/logo.png'
]);
$this->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);

$this->registerMetaTag([
  'name' => 'keywords',
  'content' => t("Export , service , Import , e-commerce , Association , Trade , Tashkent , Online market , showroom , shopping , online store , online business , shopping cart")
]);
$this->registerMetaTag([
  'name' => 'robots',
  'content' => "index, follow"
]);

$this->registerLinkTag([
  'rel' => 'canonical',
  'href' => toRoute(['/service/index'])
]);

?>
<div class="container mt-4 mb-5 company">
    <div class="category-breadcrumb mt-0 py-1 px-3">
        <a href="<?=toRoute(['/'])?>"><?=t("Home")?></a>
        >
        <a href="#"><?=t("Services")?></a>

    </div>
    <div class="row justify-content-center justify-content-md-start py-4">
        <?php foreach($services as $service):?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-3">
            <div class="card card-ecommerce">

                <div class="view overlay p-2">
                    <a  href="<?=toRoute(['service/view' , 'id' => $service->serviceTranslate->url])?>">
                        <img src="<?=siteUrl().'uploads/service/'.$service->image?>" class="img-fluid" alt="<?=$service->serviceTranslate->title?>">
                        <div class="mask rgba-white-slight waves-effect waves-light"></div>
                    </a>
                </div>

                <div class="card-body">

                    <h5 class="card-title mb-1">
                        <strong>
                            <a href="<?=toRoute(['service/view' , 'id' => $service->serviceTranslate->url])?>" class="dark-grey-text"><?=$service->serviceTranslate->title?></a>
                        </strong>
                    </h5>
                    <a href="<?=toRoute(['service/view' , 'id' => $service->serviceTranslate->url])?>" class=""><?=t("More")?></a>
                </div>

            </div>
        </div>
        <?php endforeach ?>
    </div>
      
    <!-- <h5 class="text-center font-weight-bold">More...</h5> -->
</div>