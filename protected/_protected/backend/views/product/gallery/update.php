<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
$model->status = true;
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
]); ?>

<div class="" style="width:300px;margin-right:auto;margin-left:auto;margin-top:50px;">
    <?=$form->field($model , 'status')->checkbox()?>
    <?=$form->field($model , 'product_id')->textInput(['readOnly' => true , 'value' => $model->product_id , 'style' => 'opacity:0'])->label(false)?>
    <?=$form->field($model , 'files[]')->fileInput()?>
    <?=$form->errorSummary($model)?>
    <?=Html::submitButton('Save' , ['class' => 'btn btn-success'])?>
</div>

<?php ActiveForm::end() ?>