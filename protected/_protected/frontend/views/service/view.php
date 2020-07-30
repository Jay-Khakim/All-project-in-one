<?php

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
  'content' => toRoute(['/service/view' , 'id' => $model->url])
]);
$this->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);
$this->registerMetaTag([
  'property' => 'og:image',
  'content' => siteUrl().'uploads/service/'.$model->service->image
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
  'href' => toRoute(['/service/view' , 'id' => $model->url])
]);

?>
<div class="container mt-4 single-post single_company">
    <div class="row pb-4">
        <div class="col-12 col-md-4 col-lg-2 pl-md-0 order-2  pt-6 order-md-0">

            <div class="left-banner card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">

                <div class="text-white font-weight-bold text-center d-flex align-items-center rgba-red-slight py-5 px-4">
                    <div class="rgba-red-light text-center w-100">
                        <a class="btn text-white p-1" href="#"><?=t("More")?></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-10 pr-md-0">

            <div class="category-breadcrumb mt-0 py-1 px-3">
                <a href="<?=toRoute(['/'])?>"><?=t("Home")?></a>
                >
                <a href="<?=toRoute(['/service/index'])?>"> <?=t("Services")?></a>
                >
                <a href="#"><?=$model->title?></a>

            </div>
            <section id="productDetails" class="pb-5 mt-3">
                <div class="card mt-4 hoverable">

                    <div class="row mt-5 ">
                        <div class="col-lg-6">
                            <div class="row mx-2">
                                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">

                                    <div class="carousel-inner text-center text-md-left" role="listbox">
                                        <div class="carousel-item active p-3">
                                            <img src="<?=siteUrl().'uploads/service/'.$model->service->image?>" alt="First slide" class="img-fluid">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->
                        </div>
                        <div class="col-lg-5 mr-3 text-center text-md-left">
                            <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                                <strong><?=$model->title?> </strong>
                            </h2>

                            <h3 class="h3-responsive text-center text-md-left mb-3 ml-xl-0 ml-4">
                                
                            </h3>

                            <p class="ml-xl-0 ml-4 short-description">
                            <?=$model->short_description?>
                            </p>
                            
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t('Phone')?>: </strong><?=$model->service->phone?></p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Website")?>: </strong><?=$model->service->website?></p>
                            <p class="ml-xl-0 ml-4">
                                <strong><?=t("Email")?>: </strong><?=$model->service->email?></p>

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


</div>