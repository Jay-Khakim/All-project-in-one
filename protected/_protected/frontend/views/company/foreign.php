<?php

$this->title =  t("Foreign companies");
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
  'content' => t("Foreign companies")
]);
$this->registerMetaTag([
  'property' => 'og:description',
  'content' => t("It is the first in Uzbekistan - an online showroom of the Association of Exporters of Uzbekistan.")
]);
$this->registerMetaTag([
  'property' => 'og:url',
  'content' => toRoute(['/company/foreign'])
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
  'href' => toRoute(['/company/foreign'])
]);

?>
<div class="container mt-4 mb-5 company">
    <div class="category-breadcrumb mt-0 py-1 px-3">
        <a href="<?=toRoute(['/'])?>"><?=t("Home")?></a>
        >
        <a href="#"><?=t("Foreign companies")?></a>

    </div>
    <div class="row justify-content-center justify-content-md-start py-4 foreign_company_list">
        <?php foreach($companies as $company):?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-3 wow fadeIn">
            <div class="card card-ecommerce">

                <div class="view overlay p-2">
                    <a  href="<?=toRoute(['company/view' , 'id' => $company->companyTranslate->url , 'type' => 'foreign'])?>">
                        <img src="<?=siteUrl().'uploads/company/thumb/'.$company->image?>" class="img-fluid" alt="<?=$company->companyTranslate->title?>">
                        <div class="mask rgba-white-slight waves-effect waves-light"></div>
                    </a>
                </div>

                <div class="card-body">

                    <h5 class="card-title mb-1">
                        <strong>
                            <a href="<?=toRoute(['company/view' , 'id' => $company->companyTranslate->url , 'type' => 'foreign'])?>" class="dark-grey-text"><?=substr($company->companyTranslate->title , 0 , 60)?><?=strlen($company->companyTranslate->title) < 60 ? '' : '...'?></a>
                        </strong>
                    </h5>
                    <a href="<?=toRoute(['company/view' , 'id' => $company->companyTranslate->url , 'type' => 'foreign'])?>" class=""><?=t("More")?></a>
                </div>

            </div>
        </div>
        <?php endforeach ?>
    </div>
      <?php if(count($companies) != 0): ?>
    <h5 class="text-center font-weight-bold"><a class="loading">More</a></h5>
    <?php endif ?>
</div>
<?php

$script = <<<JS

$('.loading').click(function(){
  $('.loading').text('Loading...');
  let companyCount = $('.foreign_company_list > div').length;
          let content = $('.foreign_company_list');
          // console.log(companyCount);
              $.ajax({
                url: '/site/loading',
                type: 'GET',
                data: {
                  name: 'company',
                  type: 11,
                  count: companyCount
                },
               
                success: function(res){
                 
                 //  console.log(res);
                  
                 content.append(res.partial);
   
                 if($('.foreign_company_list > div').length == res.allCount){
   
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