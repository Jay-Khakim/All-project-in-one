<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\CompanyTranslate;
use common\models\Product;
use \yii\web\Controller;


class SearchController extends Controller{

    public function actionResult($text = null){
        
        if($text == null){
            return t("not available");
        }
        // echo $text;
        $companies = Company::find()->joinWith('companyTranslates')->where(['company.status' => true , 'company_translate.lang_id' => \Yii::$app->languageId->id])->andWhere(['like' , 'company_translate.title' , $text])->all();
        $products = Product::find()->joinWith('productTranslates')->where(['product.status' => true , 'product_translate.lang_id' => \Yii::$app->languageId->id])->andWhere(['like' , 'product_translate.title' , $text])->all();
        // pre($companies);
        return $this->render('result' , [
            'companies' => $companies,
            'products' => $products
        ]);
    }
}

?>