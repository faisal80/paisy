<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BudgetDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'allocation')->textInput() ?>

    <?= $form->field($model, 'release')->textInput() ?>

    <?= $form->field($model, 'coa_id')->textInput() ?>

    <?= $form->field($model, 'budget_id')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
