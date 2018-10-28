<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\components\MenuWidget;


/* @var $this yii\web\View */
/* @var $model frontend\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= echo $form->field($model, 'parent_id')->textInput() ?>
    <?php //echo $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(\frontend\models\Category::find()->all(), 'id', 'name')) ?>

    <div class="form-group field-category-parent_id required has-success">
        <label class="control-label" for="category-parent_id">Parent Category</label>
        <select id="category-parent_id" class="form-control" name="Category[parent_id]">
            <option value="0">Independent Category</option>
            <?= MenuWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
