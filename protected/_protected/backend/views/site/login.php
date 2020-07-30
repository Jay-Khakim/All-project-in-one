<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Login');
?>
<div class="bg-light">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <h1>Вход</h1>
    <div>
        <?php if ($model->scenario === 'lwe'): ?>
            <?= $form->field($model, 'email')->label('Почта') ?>
        <?php else: ?>
            <?= $form->field($model, 'username')->label('Логин') ?>
        <?php endif ?>
    </div>
    <div>
        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
        <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомни меня') ?>
    </div>
    <div>
        <?= Html::submitButton(Yii::t('app', 'Вход'), ['class' => 'btn btn-default submit', 'name' => 'login-button']) ?>

        <a class="reset_pass" href="#">Забыли пароль?</a>
    </div>
    <div class="clearfix"></div>

    <?php ActiveForm::end(); ?>

</div>
