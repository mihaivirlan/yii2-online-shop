<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\components\MenuWidget;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model frontend\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">Parent Category</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?= MenuWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php
//        echo $form->field($model, 'content')->widget(CKEditor::class,[
//            'editorOptions' => [
//                'preset' => 'full',
//                'inline' => false,
//            ],
//        ]);
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
  'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput() ?>

    <?= $form->field($model, 'hit')->checkbox(['0', '1',]) ?>

    <?= $form->field($model, 'new')->checkbox(['0', '1',]) ?>

    <?= $form->field($model, 'sale')->checkbox(['0', '1',]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
