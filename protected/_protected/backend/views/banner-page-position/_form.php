<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\BannerPagePosition $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="banner-page-position-form">

    <?php $form = ActiveForm::begin([
    'id' => 'BannerPagePosition',
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

			<?= 
$form->field($model, 'page_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(common\models\Page::find()->all(), 'id', 'name'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['page_id'])),
    ]
); ?>

			<?= 
$form->field($model, 'position_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(common\models\Position::find()->all(), 'id', 'name'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['position_id'])),
    ]
); ?>

			<?= 
$form->field($model, 'banner_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(common\models\Banners::find()->all(), 'id', 'bannersTranslate.title'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['banner_id'])),
    ]
); ?>

			<?= $form->field($model, 'sort')->textInput() ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'BannerPagePosition'),
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

