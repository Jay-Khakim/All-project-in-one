<?php

use common\models\Blog;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\Blog $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud blog-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('models', 'Blog') ?>
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

    <?php $this->beginBlock('common\models\Blog'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'title',
            'value' => function($m){
                return $m->blogTranslate->title ? $m->blogTranslate->title : '';
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
                return '<span class="btn btn-success" style="padding:0px;"> '. ($m->type == Blog::TYPE_CURRENT_THEME ? "dolzarb" : "oddiy") . '</span>';
            },
            'format' => 'raw'
        ],
			'sort',
			[
                'attribute' => 'image',
                'value' => function($m){
                    return "<img style='width:100px;' src=".siteUrl().'uploads/blog/'.$m->image.">";
                },
                'format' => 'raw'
            ],
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


    
<?php $this->beginBlock('BlogGalleries'); ?>

<?php Pjax::begin(['id'=>'pjax-BlogGalleries', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-BlogGalleries ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getBlogGalleries(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-bloggalleries',
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
        $params[0] = 'blog-gallery' . '/' . $action;
        $params['BlogGallery'] = ['blog_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'blog-gallery'
],
        'id',
        'status',
        'image',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('BlogTranslates'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: 0px;'>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-BlogTranslates', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-BlogTranslates ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getBlogTranslates(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-blogtranslates',
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
        $params[0] = 'blog-translate' . '/' . $action;
        $params['BlogTranslate'] = ['blog_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'blog-translate'
],
        'id',
        'title',
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
    'content' => $this->blocks['common\models\Blog'],
    'active'  => true,
],
[
    'content' => $this->blocks['BlogGalleries'],
    'label'   => '<small>Blog Galleries <span class="badge badge-default">'.count($model->getBlogGalleries()->asArray()->all()).'</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['BlogTranslates'],
    'label'   => '<small>Blog Translates <span class="badge badge-default">'.count($model->getBlogTranslates()->asArray()->all()).'</span></small>',
    'active'  => false,
],
 ]
                 ]
    );
    ?>
</div>
