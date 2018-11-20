<?php
namespace backend\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;

class Admin extends ActiveRecord implements IdentityInterface{

    public static function tableName(){
        return 'admin';
    }

    public function rules(){
        return [

            ['username', 'required', 'message' => 'Please choose a username.'],

            ['username', 'unique', 'targetClass' => 'backend\models\Admin'],

        ];
    }

    public static function findIdentity($id){
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){

    }

    public static function findByUsername($username){
        return static::findOne(['username' => $username]);
    }

    public function getId(){
        return $this->id;
    }

    public function getAuthKey(){
        return $this->auth_key;
    }

    public function validateAuthKey($authKey){
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === md5 ($password);
    }

    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function setPassword($password){
        $this->password = Yii::$app->security->generatePasswordHash($password);

    }

}