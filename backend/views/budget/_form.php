<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Budget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reference_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>
    
    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'entity_id')->dropDownList(\common\models\Entity::getAll()) ?>

    <?= $form->field($model, 'func_id')->dropDownList(\common\models\Func::getAll()) ?>

    <?= $form->field($model, 'fund_id')->dropDownList(\common\models\Fund::getAll()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
