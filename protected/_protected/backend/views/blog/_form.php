<?php

use common\models\Blog;
use common\models\Lang;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Blog $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="blog-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Blog',
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
                        'value' => $model->isNewRecord ? '' : ($model->getBlogTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getBlogTranslates()->where(['lang_id' => $lang->id])->one()->title : '')
                    ])->label('Title ' . $lang->name) ?>
            <?php endforeach ?>
            
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "description[$lang->url]")->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => 'basic',
                            'inline' => false,
                        ],
                    ])->textarea([
                        'value' => $model->isNewRecord ? '' : ($model->getBlogTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getBlogTranslates()->where(['lang_id' => $lang->id])->one()->description : '')
                    ])->label('Descripiton ' . $lang->name) ?>
            <?php endforeach ?>

            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "meta_description[$lang->url]")->textarea([
                        'value' => $model->isNewRecord ? '' : ($model->getBlogTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getBlogTranslates()->where(['lang_id' => $lang->id])->one()->meta_description : '')
                    ])->label('Meta description ' . $lang->name) ?>
            <?php endforeach ?>
            <?php foreach (Lang::find()->all() as $lang) : ?>
                <?= $form->field($model, "meta_keywords[$lang->url]")->textInput([
                        'value' => $model->isNewRecord ? '' : ($model->getBlogTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getBlogTranslates()->where(['lang_id' => $lang->id])->one()->meta_keywords : '')
                    ])->label('Meta keywords ' . $lang->name) ?>
            <?php endforeach ?>
<!-- attribute status -->
			<?= $form->field($model, 'status')->checkbox() ?>
			<?= $form->field($model, 'type')->dropDownList([
                Blog::TYPE_CURRENT_THEME => 'Dolzarb'
            ] , [
                'prompt' => 'select type...(agar dolzarb bo\'lsa)'
            ]) ?>

<!-- attribute sort -->
			<?= $form->field($model, 'sort')->textInput() ?>

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
    'label'   => Yii::t('models', 'Blog'),
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

