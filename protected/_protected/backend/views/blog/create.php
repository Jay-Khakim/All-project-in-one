<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Blog $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->status = true;
$model->sort = true;
?>
<div class="giiant-crud blog-create">

    <h1>
        <?= Yii::t('models', 'Blog') ?>
        <small>
                        <?= $model->id ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
