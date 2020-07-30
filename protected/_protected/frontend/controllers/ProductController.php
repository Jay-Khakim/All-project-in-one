<?php

namespace frontend\controllers;

use common\models\Product;
use common\models\ProductTranslate;
use common\models\SubCategory;
use \yii\web\Controller;
use yii\web\HttpException;

class ProductController extends Controller{

    public function actionIndex(){
        $query = Product::find()->where(['status' => true]);
        $products = $query->orderBy('id desc')->limit(20)->all();
        $best = Product::find()->where(['status' => true , 'type' => Product::TYPE_BEST])->all();

        return $this->render('index' , [
            'products' => $products,
            'best' => $best,
            'allCount' => $query->count()
        ]);
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');
        $productTranslate = ProductTranslate::findOne(['url' => $id]);
        if(!isset($productTranslate)){
            throw new HttpException(404 , 'Page not found');
        }
        $subCategories = SubCategory::find()->where(['category_id' => $productTranslate->product->subCategory->category_id])->all();
        $similarProducts = Product::find()->where(['sub_category_id' => $productTranslate->product->sub_category_id])->all();
        return $this->render('view' , [
            'subCategories' => $subCategories,
            'productTranslate' => $productTranslate,
            'similarProducts' => $similarProducts
        ]);
    }

}


?>