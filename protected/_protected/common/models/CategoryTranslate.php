<?php

namespace common\models;

use Yii;
use \common\models\base\CategoryTranslate as BaseCategoryTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category_translate".
 */
class CategoryTranslate extends BaseCategoryTranslate
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
