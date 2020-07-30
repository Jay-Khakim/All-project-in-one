<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Carousel $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Carousels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->status = true;
$model->sort = 0;
?>
<div class="giiant-crud carousel-create">

    <h1>
        <?= Yii::t('models', 'Carousel') ?>
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
