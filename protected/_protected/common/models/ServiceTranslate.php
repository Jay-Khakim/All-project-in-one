<?php

namespace common\models;

use Yii;
use \common\models\base\ServiceTranslate as BaseServiceTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service_translate".
 */
class ServiceTranslate extends BaseServiceTranslate
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
