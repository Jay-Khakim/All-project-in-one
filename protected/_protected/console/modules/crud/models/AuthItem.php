<?php

namespace app\modules\crud\models;

use Yii;
use \app\modules\crud\models\base\AuthItem as BaseAuthItem;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "auth_item".
 */
class AuthItem extends BaseAuthItem
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
