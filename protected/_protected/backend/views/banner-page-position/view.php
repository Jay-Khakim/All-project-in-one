<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\BannerPagePosition $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Banner Page Position');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Banner Page Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud banner-page-position-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('models', 'Banner Page Position') ?>
        <small>
            <?= $model->id ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
            [ 'update', 'id' => $model->id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
            ['create'],
            ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
            . 'Full list', ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr />

    <?php $this->beginBlock('common\models\BannerPagePosition'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'status',
            'value' => function ($m) {
                return '<span class="btn btn-success" style="padding:0px;"> ' . ($m->status == 1 ? "active" : "no active") . '</span>';
            },
            'format' => 'raw'
        ],
[
    'format' => 'html',
    'attribute' => 'page_id',
    'value' => $model->getPage()->one()->name,
],
[
    'format' => 'html',
    'attribute' => 'position_id',
    'value' => $model->getPosition()->one()->name,
],
[
    'format' => 'html',
    'attribute' => 'banner_id',
    'value' => "<p style='font-weight:bold'>".$model->getBanner()->one()->bannersTranslate->title."</p><img style='width:200px;' src='".siteUrl().'uploads/banners/'.$model->banner->image."'>",
],
        'sort',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [
 [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['common\models\BannerPagePosition'],
    'active'  => true,
],
 ]
                 ]
    );
    ?>
</div>
