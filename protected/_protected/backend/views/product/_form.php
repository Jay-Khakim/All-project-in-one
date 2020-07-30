<?php

use common\models\Lang;
use common\models\Product;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Product $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(
        [
            'id' => 'Product',
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
                        'value' => $model->isNewRecord ? '' : ($model->getProductTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getProductTranslates()->where(['lang_id' => $lang->id])->one()->title : '')
                    ])->label('Title ' . $lang->name) ?>
            <?php endforeach ?>
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "short_description[$lang->url]")->textarea([
                        'value' => $model->isNewRecord ? '' : ($model->getProductTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getProductTranslates()->where(['lang_id' => $lang->id])->one()->short_description : '')
                    ])->label('Short description ' . $lang->name) ?>
            <?php endforeach ?>
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "description[$lang->url]")->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => 'basic',
                            'inline' => false,
                        ],
                    ])->textarea([
                        'value' => $model->isNewRecord ? '' : ($model->getProductTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getProductTranslates()->where(['lang_id' => $lang->id])->one()->description : '')
                    ])->label('Descripiton ' . $lang->name) ?>
            <?php endforeach ?>

            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "meta_keywords[$lang->url]")->textInput([
                        'value' => $model->isNewRecord ? '' : ($model->getProductTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getProductTranslates()->where(['lang_id' => $lang->id])->one()->meta_keywords : '')
                    ])->label('Meta keywords ' . $lang->name) ?>
            <?php endforeach ?>

            <?= $form->field($model, 'status')->checkbox() ?>
            <?= $form->field($model, 'type')->dropDownList([
                Product::TYPE_BEST => 'best'
            ] , [
                'prompt' => 'select type...(majburiy emas)'
            ]) ?>

            <?=
                $form->field($model, 'sub_category_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map(common\models\SubCategory::find()->all(), 'id', 'subCategoryTranslate.title'),
                    [
                        'prompt' => 'Select',
                        'disabled' => (isset($relAttributes) && isset($relAttributes['sub_category_id'])),
                    ]
                ); ?>

            <?=
                $form->field($model, 'company_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map(common\models\Company::find()->all(), 'id', 'companyTranslate.title'),
                    [
                        'prompt' => 'Select',
                        'disabled' => (isset($relAttributes) && isset($relAttributes['company_id'])),
                    ]
                ); ?>

            <?= $form->field($model, 'sort')->textInput() ?>


            <?= $form->field($model, 'rasm')->fileInput() ?>

        </p>
        <?php $this->endBlock(); ?>

        <?=
            Tabs::widget(
                [
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label'   => Yii::t('models', 'Product'),
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