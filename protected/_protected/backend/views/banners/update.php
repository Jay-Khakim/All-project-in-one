<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Banners $model
*/
    
$this->title = Yii::t('models', 'Banners') . " " . $model->title ? $model->title : '' . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title ? $model->title : '', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud banners-update">

    <h1>
        <?= Yii::t('models', 'Banners') ?>
        <small>
                        <?= $model->title ? $model->title : '' ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
