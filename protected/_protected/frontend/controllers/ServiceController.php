<?php

namespace frontend\controllers;

use common\models\Service;
use common\models\ServiceTranslate;
use \yii\web\Controller;
use yii\web\HttpException;

class ServiceController extends Controller{

    public function actionIndex(){

        $services = Service::find()->where(['status' => true])->all();
        return $this->render('index' , [
            'services' => $services
        ]);
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');

        $model = ServiceTranslate::findOne(['url' => $id]);

        if(!isset($model)){
            throw new HttpException(404 , "page not found!");
        }
        return $this->render('view' , [
            'model' => $model
        ]);
    }

}


?>