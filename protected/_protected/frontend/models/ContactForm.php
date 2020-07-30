<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $email;
    public $subject;
    public $message;
    public $phone;

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['email', 'subject', 'message' , 'phone'], 'required'],
            ['email', 'email'],
            [['subject' , 'message' , 'phone'] , 'string']
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
            'email' => Yii::t('app', 'Email'),
            'subject' => Yii::t('app', 'Subject'),
            'Message' => Yii::t('app', 'Message'),
            'verifyCode' => Yii::t('app', 'Verification Code'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information
     * collected by this model.
     *
     * @param  string $email The target email address.
     * @return bool          Whether the email was sent.
     */
    public function contact($email)
    {
       return Yii::$app->mailer->compose()
        ->setTo($email)
        ->setFrom([$this->email => $this->subject])
        ->setSubject( $this->subject.' contact!')
        ->setHtmlBody(
            "<b>Xabar</b><br>".$this->message." <br> <b>Email:</b>". $this->email . " <br> <b>Phone: </b>".$this->phone
        )->send();

    }
}
