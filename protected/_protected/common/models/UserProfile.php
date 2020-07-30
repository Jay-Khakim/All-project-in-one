<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first
 * @property string $last
 * @property string $description
 * @property string $address
 * @property string $phone
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'first', 'last'], 'required'],
            [['user_id'], 'integer'],
            [['description', 'address', 'phone'], 'string'],
            [['phone'], 'match', 'pattern' => '/^\+[0-9]{12}$/', 'message' => '{attribute} ' . getTranslate('must be phone number. Example: ') . '+998901234567'],
            [['first', 'last'], 'string', 'min' => 2, 'max' => 50],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first' => 'First',
            'last' => 'Last',
            'address' => 'Address',
            'phone' => 'Phone number',
            'description' => 'Description'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * This getter returs full user name
     * @return string
     */
    public function getFull(){
        return $this->first . ' ' . $this->last;
    }
}
