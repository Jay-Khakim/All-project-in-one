<?php

namespace common\models;

use Yii;
use \common\models\base\BannersTranslate as BaseBannersTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "banner_translate".
 */
class BannersTranslate extends BaseBannersTranslate
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
