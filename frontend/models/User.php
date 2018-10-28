<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;

class User extends ActiveRecord implements IdentityInterface{

//        public static function tableName(){
//        return 'user';
//    }
//
//    public function rules()
//    {
//        return [
//            ['username', 'required'],
//            ['username', 'unique'],
//            ['username', 'string', 'min' => 3],
//            [['username', 'password_hash'], 'string', 'max' => 255],
//            ['auth_key', 'string', 'max' => 32],
//        ];
//    }

    public static function tableName(){
        return 'user';
    }

    public static function findIdentity($id){
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){
//        return static::findOne(['access_token' => $token]);
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

    public function validatePassword($password){
//        return $this->password === $password;
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}