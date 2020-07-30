<?php

namespace common\models;

use Yii;
use \common\models\base\ProductGallery as BaseProductGallery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_gallery".
 */
class ProductGallery extends BaseProductGallery
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
