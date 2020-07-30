<?php

namespace common\models;

use Yii;
use \common\models\base\BannerPagePosition as BaseBannerPagePosition;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "banner_page_position".
 */
class BannerPagePosition extends BaseBannerPagePosition
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
