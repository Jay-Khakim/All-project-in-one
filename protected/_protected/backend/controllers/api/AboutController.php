<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "AboutController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class AboutController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\About';
}
