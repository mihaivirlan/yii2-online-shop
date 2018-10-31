<?php

namespace frontend\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Order extends ActiveRecord{

    public static function tableName() {
        return 'order';
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getOrderItems() {
        return $this->hasMany(OrderItems::class,['order_id' => 'id']);
    }

    public function rules() {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'boolean'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 250],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Name',
            'email' => 'E-mail',
            'phone' => 'Phone',
            'address' => 'Address',
        ];
    }
}
