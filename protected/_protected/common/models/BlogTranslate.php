<?php

namespace common\models;

use Yii;
use \common\models\base\BlogTranslate as BaseBlogTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog_translate".
 */
class BlogTranslate extends BaseBlogTranslate
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
