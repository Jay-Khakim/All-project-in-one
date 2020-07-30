<?php

namespace common\models;

use Yii;
use \common\models\base\SubCategoryTranslate as BaseSubCategoryTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sub_category_translate".
 */
class SubCategoryTranslate extends BaseSubCategoryTranslate
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
