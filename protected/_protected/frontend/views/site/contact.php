<?php
use dmstr\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = t("Contact - UzbekMart.com");

$this->registerMetaTag([
    'name' => 'description',
    'content' => ("The first in Uzbekistan online showroom of the Association of Exporters of Uzbekistan")
  ]);
  $this->registerMetaTag([
    'property' => 'og:type',
    'content' => 'website'
  ]);
  $this->registerMetaTag([
    'property' => 'og:title',
    'content' => t("Contact - Uzbekmart.com")
  ]);
  
  $this->registerMetaTag([
    'property' => 'og:description',
    'content' => ("The first in Uzbekistan online showroom of the Association of Exporters of Uzbekistan")
  ]);
  
  $this->registerMetaTag([
    'property' => 'og:url',
    'content' => toRoute(['/site/contact'])
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
    'href' => toRoute(['/site/contact'])
  ]);
?>
<div class="container my-5 py-5 z-depth-1">
    <?php foreach(\Yii::$app->session->getAllFlashes() as $index => $flash):?>
    <div class="alert alert-<?=$index?> alert-dismissible fade show" role="alert">
    <strong><?=$flash['username']?></strong> <?=$flash['data']?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <?php endforeach ?>
    <section class="px-md-5 mx-md-5 text-center dark-grey-text">

        <style>
            .map-container {
                height: 200px;
                position: relative;
            }

            .map-container iframe {
                left: 0;
                top: 0;
                height: 100%;
                width: 100%;
                position: absolute;
            }
        </style>

        <div id="map-container-google-1" class="z-depth-1 map-container mb-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d650.2518319499841!2d69.21856252920595!3d41.355331205372956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8d4e64adf79d%3A0x3a39127fd8ff297b!2sO%E2%80%99zbekiston%20Eksportchilar%20Uyushmasi!5e1!3m2!1suz!2s!4v1590062066869!5m2!1suz!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        <div class="row d-flex justify-content-center mb-5">

            <div class="col-md-6 text-center">

                <h3 class="font-weight-bold"><?=t("Contact us")?></h3>
                <?php $form = ActiveForm::begin();?>
                <?=$form->field($model , 'email' , [
                    'template' => '
                    <div class="md-form md-outline mt-3">
                        {input}
                        {label}
                        {error}
                    </div>
                    '
                ])->input('email' , [
                    'class' => 'form-control'
                ])->label(t('E-mail'))?>
                <?=$form->field($model , 'phone' , [
                    'template' => '
                    <div class="md-form md-outline mt-3">
                        {input}
                        {label}
                        {error}
                    </div>
                    '
                ])->input('text' , [
                    'class' => 'form-control'
                ])->label(t("Phone"))?>
                
                <?=$form->field($model , 'subject' , [
                    'template' => '
                    <div class="md-form md-outline mt-3">
                        {input}
                        {label}
                        {error}
                    </div>
                    '
                ])->input('text' , [
                    'class' => 'form-control'
                ])->label('Username')?>

                <?=$form->field($model , 'message' , [
                    'template' => '
                    <div class="md-form md-outline mt-3">
                        {input}
                        {label}
                        {error}
                    </div>
                    '
                ])->textarea([
                    'class' => 'md-textarea form-control',
                    'rows' => '5'
                ])->label(t('How we can help you?'))?>

                <?=Html::submitButton(''.t("Send").' <i class="fa fa-paper-plane-o ml-2"></i>' , ['class' => 'btn btn-info btn-sm ml-0'])?>
                <?php ActiveForm::end()?>
            </div>

        </div>

        <div class="row text-center">

            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">

                <i class="fa fa-map-marker fa-2x blue-text"></i>

                <p class="font-weight-bold my-3"><?=t("Address")?></p>

                <p class="text-muted"><?=t("Republic of Uzbekistan, Tashkent city, Almazar district, Korakamish street, 8A")?></p>

            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

                <i class="fa fa-phone fa-2x blue-text"></i>

                <p class="font-weight-bold my-3"><?=t("Phone number")?></p>

                <p class="text-muted">+998 71 207 00 98 <br> +998 95 145 45 10</p>

            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

                <i class="fa fa-envelope fa-2x blue-text"></i>

                <p class="font-weight-bold my-3"><?=t("E-mail")?></p>

                <p class="text-muted">info@uzbekmart.com</p>

            </div>

        </div>


    </section>


</div>
<?php

$this->registerCss('

p.help-block{
    color:red;
    font-size:14px;
    // text-align:left;
}

');

?>
