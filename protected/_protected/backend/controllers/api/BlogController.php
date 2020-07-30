<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "BlogController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class BlogController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Blog';
}
