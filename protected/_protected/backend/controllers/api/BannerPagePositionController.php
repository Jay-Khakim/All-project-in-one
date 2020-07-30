<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "BannerPagePositionController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class BannerPagePositionController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\BannerPagePosition';
}
