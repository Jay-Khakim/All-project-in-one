<?php

namespace common\models;

use Yii;
use \common\models\base\CarouselTranslate as BaseCarouselTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "carousel_translate".
 */
class CarouselTranslate extends BaseCarouselTranslate
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
