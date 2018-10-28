<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 10/17/2018
 * Time: 6:47 PM
 */

namespace frontend\controllers;

use yii\web\Controller;

class AppController extends Controller {

        protected function setMeta($title = null, $keywords = null, $description = null) {
                $this->view->title = $title;
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
                $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
        }
}