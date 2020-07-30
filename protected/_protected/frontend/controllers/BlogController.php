<?php

namespace frontend\controllers;

use common\models\Blog;
use common\models\BlogTranslate;
use \yii\web\Controller;
use yii\web\HttpException;

class BlogController extends Controller{

    public function actionIndex(){
        $query = Blog::find()->where(['status' => true]);
        $blogs = $query->orderBy('id desc')->limit(8)->all();
        $curruntBlogs = $query->andWhere(['type' => Blog::TYPE_CURRENT_THEME])->orderBy('id desc')->limit(5)->all();
        
        return $this->render('index' , [
            'blogs' => $blogs,
            'currentBlogs' => $curruntBlogs,
            'allCount' => $query->count()
        ]);
    }

    public function actionView($id){

        $model = BlogTranslate::findOne(['url' => $id]);

        if(!isset($model)){
            throw new HttpException(404 , 'Page not found');
        }
        $currentBlogs = Blog::find()->where(['status' => true])->andWhere(['!=' , 'id' , $model->blog_id])->andWhere(['type' => Blog::TYPE_CURRENT_THEME])->orderBy('id desc')->limit(4)->all();

        return $this->render('view' , [
            'model' => $model,
            'currentBlogs' => $currentBlogs
        ]);
    }

}


?>