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
  'content' => toRoute(['/blog/view' , 'id' => $model->url])
]);
$this->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);
$this->registerMetaTag([
  'property' => 'og:image',
  'content' => siteUrl().'uploads/blog/'.$model->blog->image
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
  'href' => toRoute(['/blog/view' , 'id' => $model->url])
]);

?>
<div class="container mt-4 single-post single_blog">
    <section>
        <div class="container-fluid">
            <hr class="my-5">
            <div class="container">

                <div class="row mt-5 pt-3">

                    <div class="col-lg-7 col-12 mt-1 mx-lg-4">

                        <section class="extra-margins pb-5  text-lg-left">

                            <div class="row mb-4">

                                <div class="col-md-12">

                                    <div class="card">

                                        <div class="view overlay">
                                            <img src="<?=siteUrl().'uploads/blog/'.$model->blog->image?>" class="img-fluid w-100" alt="<?=$model->title?>">
                                            <a>
                                                <div class="mask rgba-white-slight waves-effect waves-light">
                                                </div>
                                            </a>
                                        </div>

                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <strong><?=$model->title?></strong>
                                            </h4>
                                            <hr>
                                            <p class="dark-grey-text mb-3 mt-4 mx-4">
                                                <?=$model->description?>
                                            </p>
                                            <i class="far fa-clock-o"></i> <?=date('d/m/Y' , $model->blog->created_at)?>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>

                    </div>

                    <div class="col-lg-4 col-12 mt-1">

                        <section class="section widget-content">

                            <div class="card card-body pb-0">
                                <div class="single-post">
                                    
                                    <p class="font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
                                        <strong><?=t("Current themes")?></strong>
                                    </p>
                                    <?php foreach($currentBlogs as $blog):?>
                                    
                                    <div class="row mb-4">
                                        <div class="col-5">

                                            <div class="view overlay">
                                                <a href="<?=toRoute(['/blog/view' , 'id' => $blog->blogTranslate->url])?>">
                                                    <img src="<?=siteUrl().'uploads/blog/'.$blog->image?>" class="img-fluid z-depth-1 rounded-0" alt="<?=$blog->blogTranslate->title?>">
                                                    <div class="mask rgba-white-slight waves-effect waves-light">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-7">
                                            <h6 class="mt-0 font-small">
                                                <a href="<?=toRoute(['/blog/view' , 'id' => $blog->blogTranslate->url])?>">
                                                    <strong><?=$blog->blogTranslate->title?></strong>
                                                </a>
                                            </h6>

                                            <div class="post-data">
                                                <p class="font-small grey-text mb-0">
                                                    <i class="far fa-clock-o"></i> <?=date('d/m/Y' , $blog->created_at)?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </section>

                    </div>

                </div>

            </div>

        </div>
    </section>

</div>