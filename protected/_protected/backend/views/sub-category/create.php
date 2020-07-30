<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\SubCategory $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Sub Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->status = true;
$model->sort = 0;
?>
<div class="giiant-crud sub-category-create">

    <h1>
        <?= Yii::t('models', 'Sub Category') ?>
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
