<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FiscalYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fiscal-year-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fiscal_year')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'is_closed')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
