<?php
namespace frontend\models;

use yii\base\Model;
use yii\db\ActiveRecord;


class SignupForm extends ActiveRecord
{
    public $username;
    public $password;


    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

//            ['email', 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->password = md5($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
