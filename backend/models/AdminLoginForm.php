<?php
namespace backend\models;

use Yii;
use yii\base\Model;


class AdminLoginForm extends Model {

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;


    public function rules(){
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],

        ];
    }

    public function attributeLabels(){

        return [
            'username' => 'Username',
            'password' => 'Password',
            'rememberMe' => 'RememberMe'
        ];
    }


    public function validatePassword($attribute, $params){

        if (!$this->hasErrors()) {

            $user = $this->getUser();
            print_r($user);
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function login(){
        if ($this->validate()) {
            if ($this->rememberMe) {
                $u = $this->getUser();
                $u->generateAuthKey();
                $u->save();
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe);
        }
        return false;
    }


    public function getUser(){
        if ($this->_user === false) {
            $this->_user = Admin::findByUsername($this->username);
        }
        return $this->_user;
    }
}