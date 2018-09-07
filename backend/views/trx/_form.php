<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $trxModel common\models\Trx */
/* @var $trxdetailModels commom\models\Trxdetail */
/* @var $form yii\widgets\ActiveForm */
/*
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
 * 
 */
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
