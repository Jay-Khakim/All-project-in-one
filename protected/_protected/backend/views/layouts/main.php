<?php
use backend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="nav-md">
    <?php $this->beginBody() ?>
        <div class="container body">
            <div class="main_container">

                <?php if (!Yii::$app->user->isGuest):?>
                    <?=$this->render('left_side')?>
                <?php endif;?>

                <div class="top_nav"></div>

                <div class="right_col" role="main" style="min-height: 658px;">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>


            </div>

        </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
