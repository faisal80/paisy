<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Coa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'coa_grouping_id')->dropDownList(common\models\CoaGrouping::getAll(),['prompt'=>'Select a Group (if applicable)']) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_type')->dropDownList(['Asset' => 'Asset',
                                                        'Liability' => 'Liability',
                                                        'Receipt' => 'Receipt',
                                                        'Expense' => 'Expense']) ?>

    <?= $form->field($model, 'coa_id')->dropDownList(\common\models\Coa::getAll(), ['prompt'=>'Select Parent Head of Account (if Applicable)']) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
