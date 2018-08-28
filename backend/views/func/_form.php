<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Func */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="func-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'func_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'func_id')->dropDownList(common\models\Func::getAll(), ['prompt'=>'Select Parent Function (if applicable)']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
