<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "SubCategoryController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SubCategoryController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\SubCategory';
}
