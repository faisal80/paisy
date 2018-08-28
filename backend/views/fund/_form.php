<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fund */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fund-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fund_id')->dropDownList(\common\models\Fund::getAll(), ['prompt'=>'Select Parent Fund (if applicable)']) ?>

    <?= $form->field($model, 'fund_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
