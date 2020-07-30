<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "CompanyController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class CompanyController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Company';
}
