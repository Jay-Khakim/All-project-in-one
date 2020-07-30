<?php

namespace app\modules\crud\models;

use Yii;
use \app\modules\crud\models\base\AuthRule as BaseAuthRule;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "auth_rule".
 */
class AuthRule extends BaseAuthRule
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
