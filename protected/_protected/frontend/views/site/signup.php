<?php
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'Signup');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="bg-gray pb-5">
    <div class="container">
        <div class="fixer"></div>
        <div class="login-content mt-5 mb-0">
            <h2 class="text-header mt-0 mb-3 text-center">Регистрация</h2>
            <?php $form =  \yii\bootstrap\ActiveForm::begin([
                'action' => toRoute('/site/signup'),
                'method' => 'POST',
                'options' => [
                    'enctype' => 'multipart/form-data',
                    'id' => 'official-signup'
                ]
            ])?>

            <?= $form->field($model, 'first')->input('text', [
                'placeholder' => 'First name *'
            ])->label(false)?>

            <?= $form->field($model, 'last')->input('text', [
                'placeholder' => 'Last name *'
            ])->label(false)?>

            <?= $form->field($model, 'username')->input('text', [
                'placeholder' => 'Username *'
            ])->label(false)?>

            <?= $form->field($model, 'email')->input('email', [
                'placeholder' => 'Email Address *'
            ])->label(false)?>

            <?= $form->field($model, 'password')->input('password', [
                'placeholder' => 'Password *'
            ])->label(false)?>

            <?= $form->field($model, 'confirm_password')->input('password', [
                'placeholder' => 'Confirm password *'
            ])->label(false)?>

            <?= $form->field($model, 'file', [
                'template' => '
                    <label class="custom-file w-100">
                      {input}
                      <span class="custom-file-control form-control-file"></span>
                      <span class="">{error}</span>
                    </label>
                '
            ])->fileInput([
                'class' => 'border-0 custom-file-input'
            ])->label(false);?>

            <?= $form->field($model, 'agreement', [
                'template' => '
                    <label class="custom-control custom-radio pt-3">
                      {input}
                      <span class="custom-control-indicator mt-3"></span>
                      <span class="custom-control-description">I agree with the <a href="'.toRoute('/site/termsandconditions').'" class="text-danger">Terms & Conditions</a></span>
                    </label>
                    {error}
                '
            ])->input('checkbox', [
                'class' => 'custom-control-input'
            ])->label(false)?>

            <?=\yii\helpers\Html::submitButton('SIGN UP');?>

            <?php \yii\bootstrap\ActiveForm::end();?>

            <div class="w-100 login-inner text-center pt-4">
                <span>OR</span>

                <a href="#" class="btn btn-facebook w-100">
                    <i class="fa fa-facebook"></i>
                    sign in with facebook
                </a>

                <a href="#" class="btn btn-google w-100">
                    <i class="fa fa-google"></i>
                    sign in with google
                </a>

            </div>

            <span class="w-100 text-center text-description">Do you have an account? <a class="text-danger" href="<?=toRoute('/site/login')?>">Log in</a></span>
        </div>
    </div>
</div>