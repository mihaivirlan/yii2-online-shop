<?php

namespace backend\controllers;

use app\cart\ShoppingCart;
use app\models\CartAddForm;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;


class CartController extends Controller{
//    private $cart;
//
//    public function __construct($id, $module,ShoppingCart $cart, $config = []){
//        $this->cart = $cart;
//        parent::__construct($id, $module, $config);
//
//    }

    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::class(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $dataProvider = new ArrayDataProvider([
            'allModels' => Yii::$app->cart->getItems(),
        ]);
    }
}