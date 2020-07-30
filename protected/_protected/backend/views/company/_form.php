<?php

use common\models\Lang;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="company-form">

    <?php $form = ActiveForm::begin(
        [
            'id' => 'Company',
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
                <?= $form->field($model, "title[$lang->url]")->textInput([
                        'value' => $model->isNewRecord ? '' : ($model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one()->title : '')
                    ])->label('Title ' . $lang->name) ?>
            <?php endforeach ?>
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "address[$lang->url]")->textInput([
                        'value' => $model->isNewRecord ? '' : ($model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one()->address : '')
                    ])->label('Address ' . $lang->name) ?>
            <?php endforeach ?>

            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "description[$lang->url]")->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => 'basic',
                            'inline' => false,
                        ],
                    ])->textarea([
                        'value' => $model->isNewRecord ? '' : ($model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one()->description : '')
                    ])->label('Descripiton ' . $lang->name) ?>
            <?php endforeach ?>
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "meta_description[$lang->url]")->textarea([
                        'value' => $model->isNewRecord ? '' : ($model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one()->meta_description : '')
                    ])->label('Meta description ' . $lang->name) ?>
            <?php endforeach ?>
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "meta_keywords[$lang->url]")->textInput([
                        'value' => $model->isNewRecord ? '' : ($model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getCompanyTranslates()->where(['lang_id' => $lang->id])->one()->meta_keywords : '')
                    ])->label('Meta keywords ' . $lang->name) ?>
            <?php endforeach ?>
            <!-- attribute status -->
            <?= $form->field($model, 'status')->checkbox() ?>

            <!-- attribute type -->
            <?= $form->field($model, 'type')->dropDownList($model->getTypes(), [
                'prompt' => 'Select type...'
            ]) ?>

            <!-- attribute sort -->
            <?= $form->field($model, 'sort')->textInput() ?>

            <!-- attribute email -->
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <!-- attribute image -->
            <?= $form->field($model, 'rasm')->fileInput() ?>
        </p>
        <?php $this->endBlock(); ?>

        <?=
            Tabs::widget(
                [
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label'   => Yii::t('models', 'Company'),
                            'content' => $this->blocks['main'],
                            'active'  => true,
                        ],
                    ]
                ]
            );
        ?>
        <hr />

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
            '<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord ? 'Create' : 'Save'),
            [
                'id' => 'save-' . $model->formName(),
                'class' => 'btn btn-success'
            ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>