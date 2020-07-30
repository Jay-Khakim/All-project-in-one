<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "PositionController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PositionController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Position';
}
