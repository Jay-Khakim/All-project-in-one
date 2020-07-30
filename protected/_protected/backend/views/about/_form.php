<?php

use common\models\Lang;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\About $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="about-form">

    <?php $form = ActiveForm::begin([
    'id' => 'About',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "description[$lang->url]")->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => 'basic',
                            'inline' => false,
                        ],
                    ])->textarea([
                        'value' => $model->isNewRecord ? '' : ($model->getAboutTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getAboutTranslates()->where(['lang_id' => $lang->id])->one()->description : '')
                    ])->label('Descripiton ' . $lang->name) ?>
            <?php endforeach ?>

            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "meta_description[$lang->url]")->textarea([
                        'value' => $model->isNewRecord ? '' : ($model->getAboutTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getAboutTranslates()->where(['lang_id' => $lang->id])->one()->meta_description : '')
                    ])->label('Meta description ' . $lang->name) ?>
            <?php endforeach ?>
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "meta_keywords[$lang->url]")->textInput([
                        'value' => $model->isNewRecord ? '' : ($model->getAboutTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getAboutTranslates()->where(['lang_id' => $lang->id])->one()->meta_keywords : '')
                    ])->label('Meta keywords ' . $lang->name) ?>
            <?php endforeach ?>


        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'About'),
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

