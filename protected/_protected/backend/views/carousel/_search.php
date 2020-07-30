<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\CarouselSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="carousel-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'status') ?>

		<?= $form->field($model, 'sort') ?>

		<?= $form->field($model, 'image') ?>

		<?= $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'product_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
