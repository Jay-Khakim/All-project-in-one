<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\CompanySearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'email') ?>

		<?= $form->field($model, 'status') ?>

		<?= $form->field($model, 'sort') ?>

		<?= $form->field($model, 'image') ?>

		<?php // echo $form->field($model, 'type') ?>

		<?php // echo $form->field($model, 'password_hash') ?>

		<?php // echo $form->field($model, 'auth_key') ?>

		<?php // echo $form->field($model, 'password_reset_token') ?>

		<?php // echo $form->field($model, 'account_activation_token') ?>

		<?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
