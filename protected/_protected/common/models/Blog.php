<?php

namespace common\models;

use Yii;
use \common\models\base\Blog as BaseBlog;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog".
 */
class Blog extends BaseBlog
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
