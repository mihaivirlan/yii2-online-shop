<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 10/23/2018
 * Time: 2:47 PM
 */
namespace frontend\modules\admin\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;


class AppAdminController extends Controller{

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ]
        ];
    }
}