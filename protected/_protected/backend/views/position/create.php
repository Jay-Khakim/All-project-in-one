<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Position $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->status = true;
?>
<div class="giiant-crud position-create">

    <h1>
        <?= Yii::t('models', 'Position') ?>
        <small>
                        <?= $model->name ?>
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
