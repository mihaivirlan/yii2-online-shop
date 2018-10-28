<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\components\MenuWidget;

/* @var $this yii\web\View */
/* @var $model frontend\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-product-category_id required has-success">
        <label class="control-label" for="product-category_id">Parent Category</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?= MenuWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput() ?>

    <?= $form->field($model, 'hit')->textInput() ?>

    <?= $form->field($model, 'new')->textInput() ?>

    <?= $form->field($model, 'sale')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
