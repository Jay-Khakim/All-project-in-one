<?php

namespace common\models;

use Yii;
use \common\models\base\Product as BaseProduct;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 */
class Product extends BaseProduct
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
