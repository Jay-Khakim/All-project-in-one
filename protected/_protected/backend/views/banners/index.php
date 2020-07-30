<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\BannersSearch $searchModel
 */

$this->title = Yii::t('models', 'Banners');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    // Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update}";
}
$actionColumnTemplateString = '<div class="action-buttons">' . $actionColumnTemplateString . '</div>';
?>
<div class="giiant-crud banners-index">

    <?php
    //             echo $this->render('_search', ['model' =>$searchModel]);
    ?>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

    <h1>
        <?= Yii::t('models', 'Banners') ?>
        <small>
            List
        </small>
    </h1>
    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?php 
            // echo Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) 
            ?>
        </div>

    </div>

    <hr />

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'pager' => [
                'class' => yii\widgets\LinkPager::className(),
                'firstPageLabel' => 'First',
                'lastPageLabel' => 'Last',
            ],
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
            'headerRowOptions' => ['class' => 'x'],
            'columns' => [
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => $actionColumnTemplateString,
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            $options = [
                                'title' => Yii::t('yii', 'View'),
                                'aria-label' => Yii::t('yii', 'View'),
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, $options);
                        }
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        // using the column name as key, not mapping to 'id' like the standard generator
                        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                        $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                        return Url::toRoute($params);
                    },
                    'contentOptions' => ['nowrap' => 'nowrap']
                ],
                // [
                //     'attribute' => 'title',
                //     'value' => function ($m) {
                //         return $m->bannersTranslate->title ? $m->bannersTranslate->title : '';
                //     },
                //     'format' => 'raw'
                // ],
                [
                    'attribute' => 'status',
                    'value' => function ($m) {
                        return '<span class="btn btn-success" style="padding:0px;"> ' . ($m->status == 1 ? "active" : "no active") . '</span>';
                    },
                    'format' => 'raw'
                ],
                [
                    'attribute' => 'page',
                    'value' => function($m){
                        return $m->getPageName($m->page);
                    },
                    'format' => 'raw'
                ],
                [
                    'attribute' => 'position',
                    'value' => function($m){
                        return $m->getPositionName($m->position);
                    },
                    'format' => 'raw'
                ],
                'link',
                // [
                //     'class' => yii\grid\DataColumn::className(),
                //     'attribute' => 'product_id',
                //     'value' => function ($model) {
                //         if ($rel = $model->getProduct()->one()) {
                //             return Html::a($rel->productTranslate->title, ['product/view', 'id' => $rel->id,], ['data-pjax' => 0]);
                //         } else {
                //             return '';
                //         }
                //     },
                //     'format' => 'raw',
                // ],
                [
                    'attribute' => 'image',
                    'value' => function ($m) {
                        return "<img style='width:200px;' src=" . siteUrl() . 'uploads/banners/' . $m->image . ">";
                    },
                    'format' => 'raw'
                ],
            ],
        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>