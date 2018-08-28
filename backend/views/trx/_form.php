<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Trx */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trx-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'accounting_period_id')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trx_date')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'balanced')->textInput() ?>

    <?= $form->field($model, 'entity_id')->textInput() ?>

    <?= $form->field($model, 'func_id')->textInput() ?>

    <?= $form->field($model, 'fund_id')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
