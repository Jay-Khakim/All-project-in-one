<?php
namespace frontend\widgets;

use common\models\LoginForm;
use frontend\models\SignupForm;

class Menu extends \yii\bootstrap\Widget
{
    public $main = false;

    public function init(){}

    public function run()
    {
        return $this->render('menu/view');
    }
}