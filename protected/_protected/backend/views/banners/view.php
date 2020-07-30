<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var common\models\Banners $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Banners');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud banners-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('models', 'Banners') ?>
        <small>
            <?= $model->title ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-info']
            ) ?>

            <?php 
            
            // echo Html::a(
            //     '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
            //     ['create'],
            //     ['class' => 'btn btn-success']
            // ) 
            
            ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
                . 'Full list', ['index'], ['class' => 'btn btn-default']) ?>
        </div>

    </div>

    <hr />

    <?php $this->beginBlock('common\models\Banners'); ?>


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
                'attribute' => 'page',
                'value' => $model->getPageName($model->page)
            ],
            [
                'attribute' => 'position',
                'value' => $model->getPositionName($model->position)
            ],
            'link',
            // [
            //     'format' => 'html',
            //     'attribute' => 'product_id',
            //     'value' => $model->getProduct()->one()->productTranslate->title,
            // ],
            [
                'attribute' => 'image',
                'value' => function ($m) {
                    return "<img style='width:400px;' src=" . siteUrl() . 'uploads/banners/' . $m->image . ">";
                },
                'format' => 'raw'
            ],
            // [
            //     'attribute' => 'title',
            //     'value' => function ($m) {
            //         return $m->bannersTranslate->title ? $m->bannersTranslate->title : '';
            //     },
            //     'format' => 'raw'
            // ],
        ],
    ]); ?>


    <hr />

    <?= Html::a(
        '<span class="glyphicon glyphicon-trash"></span> ' . 'Delete',
        ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => '' . 'Are you sure to delete this item?' . '',
            'data-method' => 'post',
        ]
    ); ?>
    <?php $this->endBlock(); ?>




    <?= Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [
                [
                    'label'   => '<b class=""># ' . $model->id . '</b>',
                    'content' => $this->blocks['common\models\Banners'],
                    'active'  => true,
                ],
            ]
        ]
    );
    ?>
</div>