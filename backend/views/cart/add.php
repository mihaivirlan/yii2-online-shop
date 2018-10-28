<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Add item';
$this->params['breadcrumbs'][] = ['label' => 'Cart', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <?= $form->field($model, 'productId') ?>
        <?= $form->field($model, 'amount') ?>
        <div class="form-group">
            <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
