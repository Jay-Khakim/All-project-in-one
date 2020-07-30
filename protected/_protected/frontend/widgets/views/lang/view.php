<?php
use yii\helpers\Html;
?>

<div class="dropdown">
    <a class="btn btn-md dropdown-toggle" href="" id="dropdownMenuLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $current->name;?>
    </a>

    <div class="dropdown-menu dropdown-top-menu bg-spec" aria-labelledby="dropdownMenuLang">
        <?php foreach ($langs as $lang):?>

            <?= Html::a($lang->name, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl(), ['class' => 'dropdown-item']) ?>
        <?php endforeach;?>
    </div>
</div>