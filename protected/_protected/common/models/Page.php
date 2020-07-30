<?php

namespace common\models;

use Yii;
use \common\models\base\Page as BasePage;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "page".
 */
class Page extends BasePage
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
