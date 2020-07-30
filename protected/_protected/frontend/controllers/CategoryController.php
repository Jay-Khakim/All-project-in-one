<?php

namespace frontend\controllers;

use common\models\Banners;
use common\models\Category;
use common\models\CategoryTranslate;
use common\models\Product;
use common\models\SubCategory;
use common\models\SubCategoryTranslate;
use \yii\web\Controller;
use yii\web\HttpException;

class CategoryController extends Controller{

    public function actionIndex(){
        $id = \Yii::$app->request->get('id');
        $category = CategoryTranslate::findOne(['url' => $id]);
        if(!isset($category)){
            throw new HttpException(404 , 'Page not found');
        }
        $subCategories = SubCategory::find()->where(['status' => true])->andWhere(['category_id' => $category->category_id])->all();
        return $this->render('index' , [
            'subCategories' => $subCategories,
            'category' => $category
        ]);
    }

    public function actionSubCategory(){
        $id = \Yii::$app->request->get('id');

        if(empty($id)){
            throw new HttpException(404 , 'Page not found');
        }
        $subCategory = SubCategoryTranslate::findOne(['url' => $id]);
        $categories = Category::find()->where(['status' => true])->all();
        $query = Product::find()->where(['status' => true])->andWhere(['sub_category_id' => $subCategory->sub_category_id]);
        $models = $query->limit(20)->orderBy('id desc')->all();
        return $this->render('sub-category' , [
            'models' => $models,
            'categories' => $categories,
            'subCategory' => $subCategory,
            'allCount' => $query->count()
        ]);
    }

}


?>