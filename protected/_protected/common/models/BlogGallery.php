<?php

namespace common\models;

use Yii;
use \common\models\base\BlogGallery as BaseBlogGallery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog_gallery".
 */
class BlogGallery extends BaseBlogGallery
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
