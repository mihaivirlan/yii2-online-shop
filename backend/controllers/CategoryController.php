<?php


namespace backend\controllers;
use backend\models\Category;
use backend\models\Product;
use Yii;
use yii\data\Pagination;


class CategoryController extends AppController {

        public function actionIndex() {
            $hits = Product::find()->where(['hit' => 1])->limit(6)->all();
            $this->setMeta('E-Shopper');
            $this->render('index', compact('hits'));
        }

        public function actionView($id){
//            $id = Yii::$app->request->get('id');
            $category = Category::findOne($id);
            if (empty($category))
                throw new \yii\web\HttpException(404, 'This category has not been found!');

//            $products = Product::find()->where(['category_id' => $id])->all();
            $query = Product::find()->where(['category_id' => $id]);
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $products = $query->offset($pages->offset)->limit($pages->limit)->all();
            $this->setMeta('E-Shopper | ' . $category->name, $category->keywords, $category->description);
            return $this->render('view', compact('products','pages','category'));
        }

        public function actionSearch() {
            $q = trim(Yii::$app->request->get('q'));
            $this->setMeta('E-Shopper | Search: ' . $q);
            if (!$q)
                return $this->render('search', compact('products', 'pages', 'q'));
            $query = Product::find()->where(['like', 'name', $q]);
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $products = $query->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('search', compact('products', 'pages', 'q'));
        }
}