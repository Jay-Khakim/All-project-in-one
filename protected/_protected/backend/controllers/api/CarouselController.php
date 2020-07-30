<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "CarouselController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class CarouselController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Carousel';
}
