<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "ProductController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ProductController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Product';
}
