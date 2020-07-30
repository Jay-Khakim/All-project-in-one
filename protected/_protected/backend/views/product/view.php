<?php

use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\Product $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud product-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('models', 'Product') ?>
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

    <?php $this->beginBlock('common\models\Product'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'title',
            'value' => function($m){
                return $m->productTranslate->title ? $m->productTranslate->title : '';
            },
            'format' => 'raw'
        ],
        [
            'attribute' => 'status',
            'value' => function($m){
                return '<span class="btn btn-success" style="padding:0px;"> '. ($m->status == 1 ? "active" : "no active") . '</span>';
            },
            'format' => 'raw'
        ],
        [
            'attribute' => 'type',
            'value' => function($m){
                return '<span class="btn btn-success" style="padding:5px 7px;"> '. ($m->type == Product::TYPE_BEST ? "best" : "simple") . '</span>';
            },
            'format' => 'raw'
        ],
[
    'format' => 'html',
    'attribute' => 'sub_category_id',
    'value' => $model->getSubCategory()->one()->subCategoryTranslate->title,
],
[
    'format' => 'html',
    'attribute' => 'company_id',
    'value' => $model->getCompany()->one()->companyTranslate->title,
],
        'sort',
        // 'visit',
        [
            'attribute' => 'image',
            'value' => function($m){
                return "<img style='width:100px;' src=".siteUrl().'uploads/product/'.$m->image.">";
            },
            'format' => 'raw'
        ],
        // 'price',
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



<?php $this->beginBlock('ProductGalleries'); ?>
<div style='margin-top:50px;'>
    <?=Html::a('add photo' ,['product/add-image/' , 'id' => $model->id] , ['class' => 'btn btn-success'])?>

</div>
<?php Pjax::begin(['id'=>'pjax-ProductGalleries', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-ProductGalleries ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getProductGalleries(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-productgalleries',
        ]
    ]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel'  => 'Last'
    ],
    'columns' => [
 [
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{delete}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function ($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'product' . '/' . $action;
        $params['ProductGallery'] = ['product_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        'delete' => function ($url, $model, $key) {
            $options = [
                'title' => Yii::t('yii', 'Delete'),
                'aria-label' => Yii::t('yii', 'Delete'),
                'data-pjax' => '0',
                'class' => 'btn btn-danger',
                'data-method' => 'POST',
                'data-confirm' => 'Rostdan ham o\'chirmoqchimisiz?'
            ];
            return Html::a('<span class="glyphicon glyphicon-trash"></span>', toRoute(['/product/delete-image' , 'id' => $model->id]), $options);
        },
        'update' => function ($url, $model, $key) {
            $options = [
                'title' => Yii::t('yii', 'Update'),
                'aria-label' => Yii::t('yii', 'Update'),
                'data-pjax' => '0',
                'class' => 'btn btn-warning'
            ];
            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', toRoute(['/product/update-image' , 'id' => $model->id]), $options);
        }
    ],
    'controller' => 'product-gallery'
],
        'id',
        [
            'attribute' => 'status',
            'value' => function($m){
                return $m->status == 1 ? "<span class='btn btn-success'>active</span>" : "<span class='btn btn-danger'>no active</span>";
            },
            'format' => 'raw'
        ],
        [
            'attribute' => 'image',
            'value' => function($m){
                return "<img style='width:200px;height:200px;' src=".siteUrl().'uploads/product/'.$m->image.">";
            },
            'format' => 'raw'
        ],
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('ProductTranslates'); ?>

<?php Pjax::begin(['id'=>'pjax-ProductTranslates', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-ProductTranslates ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getProductTranslates(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-producttranslates',
        ]
    ]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel'  => 'Last'
    ],
    'columns' => [
 [
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function ($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'product-translate' . '/' . $action;
        $params['ProductTranslate'] = ['product_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'product-translate'
],
        'id',
        'title',
        'short_description:ntext',
        'description:ntext',
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'lang_id',
    'value' => function ($model) {
        if ($rel = $model->getLang()->one()) {
            return Html::a($rel->name, ['lang/view', 'id' => $rel->id,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
        'url:url',
        'meta_title',
        'meta_description',
        'meta_keywords',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [
 [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['common\models\Product'],
    'active'  => true,
],
[
    'content' => $this->blocks['ProductGalleries'],
    'label'   => '<small>Product Galleries <span class="badge badge-default">'.count($model->getProductGalleries()->asArray()->all()).'</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['ProductTranslates'],
    'label'   => '<small>Product Translates <span class="badge badge-default">'.count($model->getProductTranslates()->asArray()->all()).'</span></small>',
    'active'  => false,
],
 ]
                 ]
    );
    ?>
</div>
