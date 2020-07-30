<?php

namespace frontend\controllers;

use common\models\Banners;
use \yii\web\Controller;
use common\models\Company;
use common\models\CompanyTranslate;
use common\models\Product;
use yii\web\HttpException;

class CompanyController extends Controller{

    public function actionIndex(){

        throw new HttpException(404 , 'Page not found!');
        return $this->render('index' , [

        ]);
    }

    public function actionLocal(){

        $companies = Company::find()->where(['status' => true])->andWhere(['type' => Company::TYPE_LOCAL])->orderBy('id desc')->limit(20)->all();

        return $this->render('local' , [
            'companies' => $companies
        ]);
    }

    public function actionForeign(){

        $companies = Company::find()->where(['status' => true])->andWhere(['type' => Company::TYPE_FOREIGN])->orderBy('id desc')->limit(20)->all();

        return $this->render('foreign' , [
            'companies' => $companies
        ]);
    }

    public function actionView(){
        $id = \Yii::$app->request->get('id');
        $model = CompanyTranslate::findOne(['url' => $id]);

        if($model == null){
            throw new HttpException(404 , "Page not found!");
        }
        $products = Product::find()->where(['status' => true])->andWhere(['company_id' => $model->company_id])->limit(8)->orderBy('id desc')->all();
        return $this->render('view' , [
            'model' => $model,
            'products' => $products
        ]);
    }

}


?>