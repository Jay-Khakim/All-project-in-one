<?php

namespace common\models;

use Yii;
use \common\models\base\SubCategory as BaseSubCategory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sub_category".
 */
class SubCategory extends BaseSubCategory
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
