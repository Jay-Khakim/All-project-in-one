<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
Yii::$app->language = Yii::$app->languageId->url ? Yii::$app->languageId->url : 'en';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T3XMV56');</script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167461621-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-167461621-1');
    </script>

    <link rel="shortcut icon" href="https://uzbekmart.com/themes/default/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=siteUrl().'themes/default/favicon/apple-touch-icon.png'?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=siteUrl().'themes/default/favicon/favicon-32x32.png'?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=siteUrl().'themes/default/favicon/favicon-16x16.png'?>">
    <link rel="manifest" href="<?=siteUrl().'themes/default/favicon/site.webmanifest'?>">
    <link rel="mask-icon" href="<?=siteUrl().'themes/default/favicon/safari-pinned-tab.svg'?>" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- <script src="//code.jivosite.com/widget/OZQfL3AsW1" async></script> -->
    <meta name="google-site-verification" content="gjVe312PgQV8GFoOFrOdwHUFN7N5LNb5adT1qlhLYRU" />
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3XMV56"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
        <?= $this->render('_header');?>
        <div class="main">

            <?= $content ?>
            
        </div>

        <?=$this->render('_footer')?>
    </div>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
