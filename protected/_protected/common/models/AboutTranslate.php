<?php

namespace common\models;

use Yii;
use \common\models\base\AboutTranslate as BaseAboutTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "about_translate".
 */
class AboutTranslate extends BaseAboutTranslate
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
