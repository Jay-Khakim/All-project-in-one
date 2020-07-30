<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "CategoryController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class CategoryController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Category';
}
