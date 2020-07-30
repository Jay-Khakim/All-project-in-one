<?php
namespace frontend\models;

use common\models\User;
use common\models\UserProfile;
use yii\base\Model;
use Yii;

/**
 * Model representing  User Edit Form.
 */
class UserEditForm extends Model
{
    public $username;
    public $email;
    public $status;

    public $first;
    public $last;
    public $description;
    public $phone;
    public $address;
    public $user_id;

    public $location_id;

    public $file;

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'unique', 'targetClass' => '\common\models\User',
                'message' => 'This username has already been taken.'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User',
                'message' => 'This email address has already been taken.'],

            [['first', 'last'], 'filter', 'filter' => 'trim'],
            [['first', 'last', 'location_id'], 'required'],
            ['first', 'string', 'min' => 2, 'max' => 50],
            ['last', 'string', 'min' => 2, 'max' => 50],
            ['phone', 'string', 'min' => 7],
            ['description', 'string'],

            ['location_id', 'integer'],

            [['file'], 'file',
                'skipOnEmpty'=>true,
                'extensions'=>'png,jpg,gif,jpeg',
                'maxSize'=>1024*1025*1,
                'tooBig' => 'File size is to big. Max file size must be 2 mb'
            ]
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
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * Signs up the user.
     * If scenario is set to "rna" (registration needs activation), this means
     * that user need to activate his account using email confirmation method.
     *
     * @return User|null The saved model or null if saving fails.
     */
    public function edit()
    {
        $user = User::findOne(Yii::$app->user->identity->id);

        $user->email = $this->email;
        $user->updated_at = time();

        if($this->file) {
            $filename = toAscii(str_replace('.'.$this->file->extension, '', $this->file->name)).'_'.(int)microtime(true).'.'.$this->file->extension;
            $user->image = $filename;
        }

        if($user->image && $this->file) {
            $this->file->saveAs(\Yii::getAlias('@uploads').'/user/'.$user->image);
        }


        if ($user->save ()){
            $user_profile = UserProfile::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
            if(!$user_profile) {
                $user_profile = new UserProfile();
                $user_profile->user_id = Yii::$app->user->identity->id;
            }

            $user_profile->first = $this->first;
            $user_profile->last = $this->last;
            $user_profile->description = $this->description;
            $user_profile->phone = $this->phone;
            $user_profile->location_id = $this->location_id;

            if($user_profile->save()) {
                return $user;
            }
            // if user is saved and role is assigned return user object
            return null;
        }

        return null;
    }

}
