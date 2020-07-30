<?php

namespace common\models;

use Yii;
use \common\models\base\CompanyTranslate as BaseCompanyTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "company_translate".
 */
class CompanyTranslate extends BaseCompanyTranslate
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
