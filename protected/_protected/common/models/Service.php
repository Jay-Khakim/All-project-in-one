<?php

namespace common\models;

use Yii;
use \common\models\base\Service as BaseService;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service".
 */
class Service extends BaseService
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
