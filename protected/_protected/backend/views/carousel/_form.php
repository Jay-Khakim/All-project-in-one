<?php

use common\models\Lang;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Carousel $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="carousel-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Carousel',
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
                        'value' => $model->isNewRecord ? '' : ($model->getCarouselTranslates()->where(['lang_id' => $lang->id])->one() ? $model->getCarouselTranslates()->where(['lang_id' => $lang->id])->one()->title : '')
                    ])->label('Title ' . $lang->name) ?>
            <?php endforeach ?>
            
			<?= $form->field($model, 'status')->checkbox() ?>

			<?= $form->field($model, 'sort')->textInput() ?>
<?php

$selectedProducts = \common\models\Carousel::find()->select('product_id')->asArray()->all();
$products = [];
foreach($selectedProducts as $select){
array_push($products , $select['product_id']);
}

?>
			<?= 
$form->field($model, 'product_id')->widget(Select2::className(),
    [
        'data' => \yii\helpers\ArrayHelper::map(common\models\Product::find()->where(['status' => true])->andWhere(['not in' , 'id' , $products])->all(), 'id', 'productTranslate.title'),
        'options' => [
            'placeholder' => 'select product...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]
); ?>

			<?= $form->field($model, 'rasm')->fileInput() ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'Carousel'),
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

