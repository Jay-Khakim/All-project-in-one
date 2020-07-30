<?php

namespace common\models;

use Yii;
use \common\models\base\ProductTranslate as BaseProductTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_translate".
 */
class ProductTranslate extends BaseProductTranslate
{

public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
             parent::rules(),
             [
                  # custom validation rules
             ]
        );
    }
}
