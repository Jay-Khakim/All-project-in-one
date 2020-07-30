<?php

$this->title =  t("About - Uzbekmart.com");
?>
<?php

$this->registerMetaTag([
  'name' => 'description',
  'content' => substr(strip_tags($about->aboutTranslate->description) , 0 , 300)
]);
$this->registerMetaTag([
  'property' => 'og:type',
  'content' => 'website'
]);
$this->registerMetaTag([
  'property' => 'og:title',
  'content' => t("About - Uzbekmart.com")
]);

$this->registerMetaTag([
  'property' => 'og:description',
  'content' => substr(strip_tags($about->aboutTranslate->description) , 0 , 300)
]);

$this->registerMetaTag([
  'property' => 'og:url',
  'content' => toRoute(['/site/about'])
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
  'href' => toRoute(['/site/about'])
]);

?>
<?php
use yii\helpers\Html;

?>
<div class="container my-4">
    <h2 class=""><?=t("About")?></h2>
    <div class="card p-4">
        <?=$about->aboutTranslate->description?>
    </div>
</div>
