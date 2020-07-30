<?php

function getTranslate($translate) {
    return Yii::t('main',$translate) !== "" ? Yii::t('main',$translate) : $translate;
}

function t($translate){
    return getTranslate($translate);
}

function siteUrl($actual = 0) {
    $url = \yii\helpers\Url::to('/', true);
    if(!$actual) {
        switch (true) {
            case strpos($url, 'admin.'):
                return str_replace('admin.', '', $url);
                break;
            case strpos($url, 'backend.'):
                return str_replace('admin.', '', $url);
                break;
        }
    }
    return $url;
}

function toRoute($route) {
    return \yii\helpers\Url::toRoute($route);
}

function isHome() {
    $url =  \yii\helpers\Url::to('');
    if($url === '/' || $url === '/'.Yii::$app->language || $url === '/'.Yii::$app->language.'/')
        return true;
    return false;
}

/*
    * logged user datas
*/
function user_datas() {
    return \Yii::$app->user->identity;
}
/*
    *
    *		FUNCTION FOR FAST PRINTING ARRAYS
    *
*/
function pre($arr = array()) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

/*
    * get app current lang name without il18n code (example: ru-Ru = ru)
*/
function appLang() {
    $lang = \Yii::$app->language;
    // return substr($lang, 0,strpos($lang, '-'));
    return $lang;
}


/*
    * url generator
*/

function toAscii($str, $delimiter='-') {
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', rus2translit(trim($str)));
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[_|+ -]+/", $delimiter, $clean);
    return $clean;
}

/*
    * transitration
*/
function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'ye',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        '/' => '-',   ' ' => '-'
    );
    return strtr($string, $converter);
}

/*
    * оброботчик картинок
*/
// crop
function crop($filename, $width, $height,$path,$suffix='croped_',array $start = [0, 0],$quality=80) {
    if($filename && file_exists(Yii::getAlias('@uploads/'.$path.'/'.$suffix.$filename))) { // смотрим, нет ли такой картинки на сервере, то есть, не была ли она уже обрезана
        \yii\imagine\Image::crop(Yii::getAlias('@uploads/'.$path.'/'.$filename), $width,$height,$start)->save(Yii::getAlias('@uploads/'.$path.'/'.$suffix.$filename), ['quality' => $quality]);
        return siteUrl().'uploads/'.$path.'/'.$suffix.$filename;
    }else {
        return  'File not found!';
    }
    return false;
}

// thumbnail
function thumbnail($filename, $width, $height,$path,$suffix='thumb_') {
    if($filename && file_exists(Yii::getAlias('@uploads/'.$path.'/'.$filename))) {
        if(!file_exists(Yii::getAlias('@uploads/'.$path.'/'.$suffix.$filename))) { // смотрим, нет ли такой картинки на сервере, то есть, не была ли она уже обрезана
            \yii\imagine\Image::thumbnail(Yii::getAlias('@uploads/'.$path.'/'.$filename), $width,$height)->save(Yii::getAlias('@uploads/'.$path.'/'.$suffix.$filename));
        }
        return siteUrl().'uploads/'.$path.'/'.$suffix.$filename;
    }else {
        return 'File not found!';
    }
}

// resize
function resize($filename, $size,$path,$type='widen',$suffix='resized_') {
    $imagine = new \Imagine\Gd\Imagine();
    if($filename && file_exists(Yii::getAlias('@uploads/'.$path.'/'.$filename ))) { // смотрим, нет ли
        if(!file_exists(Yii::getAlias('@uploads/'.$path.'/'.$suffix.$filename))) {
            $image = $imagine->open(Yii::getAlias('@uploads/'.$path.'/'.$filename) );
            // get original size and set width (widen) or height (heighten).
            // width or height will be set maintaining aspect ratio.
            switch ($type) {
                case 'widen':
                    $image->resize($image->getSize()->widen($size));
                    break;
                case 'heighten':
                    $image->resize($image->getSize()->heighten($size));
                    break;
            }
            $image->save( Yii::getAlias('@uploads/'.$path.'/'.$suffix.$filename ));
        }
        return siteUrl().'uploads/'.$path.'/'.$suffix.$filename;
    }else {
        return 'File not found!';
    }
}

function letters($lang) {
    $arr = [
        'ru' => [
            'А',
            'Б',
            'В',
            'Г',
            'Д',
            'Е',
            'Ё',
            'Ж',
            'З',
            'И',
            'Й',
            'К',
            'Л',
            'М',
            'Н',
            'О',
            'П',
            'Р',
            'С',
            'Т',
            'У',
            'Ф',
            'Х',
            'Ц',
            'Ч',
            'Ш',
            'Щ',
            'Ъ',
            'Ы',
            'Ь',
            'Э',
            'Ю',
            'Я',
        ],
        'en' => [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
        ]
    ];

    if(array_key_exists($lang, $arr)) {
        return $arr[$lang];
    }else {
        return [];
    }

}

function month2Rus($month) {
    $arr = array(
        1=>getTranslate("january"),
        2=>getTranslate("fabruary"),
        3=>getTranslate("march"),
        4=>getTranslate("april"),
        5=>getTranslate("may"),
        6=>getTranslate("june"),
        7=>getTranslate("july"),
        8=>getTranslate("august"),
        9=>getTranslate("september"),
        10=>getTranslate("october"),
        11=>getTranslate("november"),
        12=>getTranslate("december"));
    $month = ltrim($month, '0');
    return $arr[$month];
}


function showPrice($price) {
    echo str_replace(',', ' ', number_format($price));
}
