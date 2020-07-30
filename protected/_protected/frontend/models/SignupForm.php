<?php
namespace frontend\models;

use common\models\User;
use common\rbac\helpers\RbacHelper;
use nenad\passwordStrength\StrengthValidator;
use yii\base\Model;
use Yii;
use yii\web\UploadedFile;

/**
 * Model representing  Signup Form.
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    public $status;

    public $first;
    public $last;
    public $description;
    public $phone;
    public $address;
    public $user_id;

    public $file;

    public $agreement;


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

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['confirm_password', 'required'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message'=> "Passwords don't match"],

            [['agreement'], 'required', 'message' => 'You must agree agreement.'],
            ['agreement', function ($attribute, $params, $validator) {
                if (!in_array($this->$attribute, [1, true])) {
                    $this->addError($attribute, 'Нужно согласиться с офертой.');
                }
            }],

            // on default scenario, user status is set to active
            ['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],
            // status is set to not active on rna (registration needs activation) scenario
            ['status', 'default', 'value' => User::STATUS_NOT_ACTIVE, 'on' => 'rna'],
            // status has to be integer value in the given range. Check User model.
            ['status', 'in', 'range' => [User::STATUS_NOT_ACTIVE, User::STATUS_ACTIVE]],

            [['first', 'last'], 'filter', 'filter' => 'trim'],
            [['first', 'last'], 'required'],
            ['first', 'string', 'min' => 2, 'max' => 50],
            ['last', 'string', 'min' => 2, 'max' => 50],
            ['phone', 'string'],
            [['phone'], 'match', 'pattern' => '/^\+[0-9]{12}$/', 'message' => '{attribute} ' . getTranslate('must be phone number. Example: ') . '+998901234567'],
            ['description', 'string'],
            ['address', 'string'],

            [['file'], 'file',
                'skipOnEmpty'=>true,
                'extensions'=>'png,jpg,gif,jpeg',
                'maxSize'=>1024*1025*1,
                'tooBig' => 'File size is to big. Max file size must be 2 mb'
            ]
        ];
    }

    /**
     * Set password rule based on our setting value (Force Strong Password).
     *
     * @return array Password strength rule
     */
    private function passwordStrengthRule()
    {
        // get setting value for 'Force Strong Password'
        $fsp = Yii::$app->params['fsp'];

        // password strength rule is determined by StrengthValidator 
        // presets are located in: vendor/nenad/yii2-password-strength/presets.php
        $strong = [['password'], StrengthValidator::className(), 'preset'=>'normal'];

        // use normal yii rule
        $normal = ['password', 'string', 'min' => 6];

        // if 'Force Strong Password' is set to 'true' use $strong rule, else use $normal rule
        return ($fsp) ? $strong : $normal;
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
            'password' => Yii::t('app', 'Password'),
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
    public function signup()
    {
        $user = new User();

        $user->username = $this->username ? $this->username : $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = $this->status;

        // if scenario is "rna" we will generate account activation token
        if ($this->scenario === 'rna')
        {
            $user->generateAccountActivationToken();
        }

        if($this->file) {
            $filename = toAscii(str_replace('.'.$this->file->extension, '', $this->file->name)).'_'.(int)microtime(true).'.'.$this->file->extension;
            $user->image = $filename;
        }

        if($user->image && $this->file) {
            $this->file->saveAs(\Yii::getAlias('@uploads').'/user/'.$user->image);
        }


        if ($user->save ()){
            $user_profile = new \common\models\UserProfile();
            $user_profile->user_id = $user->id;
            $user_profile->first = $this->first;
            $user_profile->last = $this->last;
            $user_profile->description = $this->description;
            $user_profile->address = $this->address;
            $user_profile->phone = $this->phone;

            if($user_profile->save()) {
                return RbacHelper::assignRole($user->getId()) ? $user : null;
            }
            // if user is saved and role is assigned return user object
            return null;
        }

        return null;
    }

    /**
     * Sends email to registered user with account activation link.
     *
     * @param  object $user Registered user.
     * @return bool         Whether the message has been sent successfully.
     */
    public function sendAccountActivationEmail($user)
    {
        return Yii::$app->mailer->compose('accountActivationToken', ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account activation for ' . Yii::$app->name)
            ->send();
    }
}
