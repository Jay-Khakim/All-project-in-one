<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "ServiceController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ServiceController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Service';
}
