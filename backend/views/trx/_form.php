<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $trxModel common\models\Trx */
/* @var $trxdetailModels commom\models\Trxdetail */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="trx-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'validateOnChange' => true,
        'validateOnBlur' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ]
    ]); ?>
    
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($trxModel, 'accounting_period_id')->textInput() ?>
        </div>
        <div class="col-sm-10">
            <?= $form->field($trxModel, 'description')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($trxModel, 'trx_date')->textInput() ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($trxModel, 'amount')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($trxModel, 'balanced')->textInput() ?>
        </div>

        <div class="col-sm-2">
            <?= $form->field($trxModel, 'entity_id')->textInput() ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($trxModel, 'func_id')->textInput() ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($trxModel, 'fund_id')->textInput() ?>
        </div>
    </div>

    <?= $this->render('_form_trx_detail', [
        'form' => $form,
        'trxModel' => $trxModel,
        'trxdetailModels' => $trxdetailModels
    ]) ?>
        
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
