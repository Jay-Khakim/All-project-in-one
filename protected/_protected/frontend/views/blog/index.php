<?php

$this->title =  t("Blogs | UzbekMart.com");
?>
<?php
$this->registerMetaTag([
    'name' => 'description',
    'content' => t("It is the first in Uzbekistan - an online showroom of the Association of Exporters of Uzbekistan.")
]);
$this->registerMetaTag([
    'property' => 'og:type',
    'content' => 'website'
]);
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => t("Blogs | UzbekMart.com")
]);
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => t("It is the first in Uzbekistan - an online showroom of the Association of Exporters of Uzbekistan.")
]);
$this->registerMetaTag([
    'property' => 'og:url',
    'content' => toRoute(['/blog/index'])
]);
$this->registerMetaTag([
    'property' => 'og:site_name',
    'content' => "uzbekmart.com"
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => siteUrl() . 'themes/default/img/logo/logo.png'
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
    'href' => toRoute(['/blog/index'])
]);

?>
<div class="container my-4">
    <!-- New products -->
    <div class="row top-products mb-5">

        <div class="col-12 my-4">
            <div class="row glogs py-2">
                <div class="col-9 px-0">
                    <div class="container">

                        <section class="dark-grey-text content_blogs">
                            <h2 class="text-center font-weight-bold mb-4 pb-2"><?= t("All blogs") ?></h2>
                            <?php foreach ($blogs as $index => $blog) : ?>

                                <?php if ($index % 2 == 0) : ?>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-lg-5">
                                            <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                                                <a href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>">
                                                    <img class="img-fluid" src="<?= siteUrl() . 'uploads/blog/' . $blog->image ?>" alt="<?= $blog->blogTranslate->title ?>">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <h4 class="font-weight-bold mb-1"><strong><?= $blog->blogTranslate->title ?></strong></h4>

                                            <p>
                                                <?php

                                                        $str = substr($blog->blogTranslate->description, 0, 300);

                                                        $result = substr($str, 0, strrpos($str, ' '));
                                                        echo $result;

                                                        ?>
                                            </p>

                                            <p> <?= date('d/m/Y', $blog->created_at) ?></p>
                                            <a class="btn btn-primary btn-md mx-0" href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>"><?= t("More") ?></a>
                                        </div>
                                    </div>

                                <?php else : ?>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-lg-7">
                                            <h4 class="font-weight-bold mb-1"><strong><?= $blog->blogTranslate->title ?></strong></h4>

                                            <p>
                                                <?php

                                                        $str = substr($blog->blogTranslate->description, 0, 300);

                                                        $result = substr($str, 0, strrpos($str, ' '));
                                                        echo $result;

                                                        ?>
                                            </p>

                                            <p><?= date('d/m/Y', $blog->created_at) ?></p>
                                            <a class="btn btn-success btn-md btn-rounded mx-0" href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>"><?= t("More") ?></a>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                                                <a href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>">
                                                    <img class="img-fluid" src="<?= siteUrl() . 'uploads/blog/' . $blog->image ?>" alt="<?= $blog->blogTranslate->title ?>">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>

                            <?php endforeach ?>
                        </section>

                    </div>
                </div>
                <div class="col-3">
                    <?php foreach ($currentBlogs as $blog) : ?>
                        <div class="row align-items-center mb-3">
                            <div class="col-lg-4 pr-0">
                                <div class="view overlay rounded z-depth-2 mb-lg-0 p-0">
                                    <a href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>">
                                        <img class="img-fluid" src="<?= siteUrl() . 'uploads/blog/' . $blog->image ?>" alt="<?= $blog->blogTranslate->title ?>">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 pr-0">
                                <a class="font-weight-bold" href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>"><?= $blog->blogTranslate->title ?></a>
                                <p>

                                    <?php

                                        $str2 = substr($blog->blogTranslate->description, 0, 50);

                                        $result = substr($str2, 0, strrpos($str2, ' '));
                                        echo $result;

                                        ?>

                                    ...</p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="d-flex w-100 justify-content-center">
                    <?php if($allCount > 8): ?>
                    <a href="#" class="more-link loading">More</a>
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
  let blogsCount = $('.content_blogs > div').length;
          let content = $('.content_blogs');
          // console.log(blogsCount);
              $.ajax({
                url: '/site/loading',
                type: 'GET',
                data: {
                  name: 'blogs',
                  type: null,
                  count: blogsCount
                },
               
                success: function(res){
                 
                 //  console.log(res);
                  
                 content.append(res.partial);
   
                 if($('.content_blogs > div').length == res.allCount){
   
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