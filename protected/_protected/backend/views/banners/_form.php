<?php

use common\models\Lang;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\select2\Select2;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Banners $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="banners-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Banners',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>

			<?= $form->field($model, 'status')->checkbox() ?>
			<?= $form->field($model, 'page')->dropDownList($model->getPages() , [
                'prompt' => 'select page'
            ]) ?>
			<?= $form->field($model, 'position')->dropDownList($model->getPositions() , [
                'prompt' => 'select position'
            ]) ?>
			<?= $form->field($model, 'link')->textInput([
                'value' => $model->link ? $model->link : ''
            ]) ?>


			<?= $form->field($model, 'rasm')->fileInput() ?>

            <?=$form->errorSummary($model)?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'Banners'),
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

