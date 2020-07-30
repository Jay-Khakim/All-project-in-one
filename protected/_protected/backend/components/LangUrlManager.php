<?php
namespace backend\components;

use yii\web\UrlManager;
use common\models\Lang;

class LangUrlManager extends UrlManager
{
    public function createUrl($params)
    {
        if( isset($params['lang_id']) ){
            //Если указан идентификатор языка, то делаем попытку найти язык в БД,
            //иначе работаем с языком по умолчанию
            $lang = Lang::findOne($params['lang_id']);
            if( $lang === null ){
                $lang = Lang::getDefaultLang();
            }
            unset($params['lang_id']);
        } else {
            //Если не указан параметр языка, то работаем с текущим языком
            $lang = Lang::getCurrent();
        }
        
        //Получаем сформированный URL(без префикса идентификатора языка)
        $url = parent::createUrl($params);

        $url_list = explode('/', $url);

        $url = '';

        for ($i = 1; $i < count($url_list); $i++){
            if ($url_list[$i] === 'admin'/* or $url_list[$i] === 'en' or $url_list[$i] === 'uz' or $url_list[$i] === 'ru'*/) continue;
            $url .= '/'.$url_list[$i];
        }
        
        //Добавляем к URL префикс - буквенный идентификатор языка
        if( $url == '/' ){
            return '/admin/'.$lang->url;
        }else{
            return '/admin/'.$lang->url.$url;
        }
    }
}