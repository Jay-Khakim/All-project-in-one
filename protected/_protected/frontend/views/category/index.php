<?php

$this->title =  $category->category->categoryTranslate->title;
?>
<?php
$this->registerMetaTag([
    'name' => 'description',
    'content' => $category->category->categoryTranslate->meta_description
  ]);
$this->registerMetaTag([
  'property' => 'og:type',
  'content' => 'website'
]);
$this->registerMetaTag([
  'property' => 'og:title',
  'content' => $category->title
]);
$this->registerMetaTag([
  'property' => 'og:description',
  'content' => $category->meta_description
]);
$this->registerMetaTag([
  'property' => 'og:url',
  'content' => toRoute(['/category/index' , 'id' => $category->url])
]);
$this->registerMetaTag([
  'property' => 'og:site_name',
  'content' => "uzbekmart.com"
]);
$this->registerMetaTag([
  'property' => 'og:image',
  'content' => siteUrl().'uploads/category/'.$category->category->icon
]);
$this->registerMetaTag([
  'name' => 'keywords',
  'content' => $category->meta_keywords
]);
$this->registerMetaTag([
  'name' => 'robots',
  'content' => "index, follow"
]);

$this->registerLinkTag([
  'rel' => 'canonical',
  'href' => toRoute(['/category/index' , 'id' => $category->url])
]);

?>
<div class="container mx-auto my-3 py-2" style="height: 400px;">
    <h3 class="font-weight-bold"><?=$category->category->categoryTranslate->title?></h3>
    <div class="row">
    <?php foreach($subCategories as $sub): ?>
        <div class="col-3">
        <a class="btn btn-outline-primary" href="<?=toRoute(['category/sub-category' , 'id' => $sub->subCategoryTranslate->url , 'category' => $sub->category->categoryTranslate->url])?>">
        <img style="width:30px;" src="<?=siteUrl().'uploads/category/'.$sub->image?>">    
        <span class="pl-2"><?=$sub->subCategoryTranslate->title?></span>
        </a>
        </div>
    <?php endforeach ?>
    </div>
</div>
