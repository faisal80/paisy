<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJS('$("form input:text, form textarea").first().focus();', yii\web\View::POS_READY);

/* @var $this yii\web\View */
/* @var $model common\models\CoaGrouping */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coa-grouping-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
