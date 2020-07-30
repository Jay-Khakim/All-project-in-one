<?php
namespace frontend\models;

use common\models\City;
use common\models\Specialization;
use common\models\User;
use common\models\UserProfile;
use common\models\UserSpecializations;
use common\rbac\helpers\RbacHelper;
use nenad\passwordStrength\StrengthValidator;
use yii\base\Model;
use Yii;

/**
 * Model representing  Signup Form.
 */
class PasswordEditForm extends Model
{

    public $password;
    public $password_repeat;

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message'=>"Пароли не совподают" ],

        ];
    }

    /**
     * Returns the attribute labels.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'password' => Yii::t('app', 'Password')
        ];
    }

    /**
     * Signs up the user.
     * If scenario is set to "rna" (registration needs activation), this means
     * that user need to activate his account using email confirmation method.
     *
     * @return User|null The saved model or null if saving fails.
     */

    public function edit (){
        if ($this->validate()) {
            $user = User::findOne(Yii::$app->user->identity->id);

            if($this->password) {
                $user->setPassword($this->password);
            }

            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    /**
     * Sends email to registered user with account activation link.
     *
     * @param  object $user Registered user.
     * @return bool         Whether the message has been sent successfully.
     */
}
