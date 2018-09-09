<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\JsExpression;
//use kartik\widgets\FileInput;
//use app\modules\yii2extensions\models\Image;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $trxModel common\models\Trx */
/* @var $trxdetailModels commom\models\Trxdetail */
/* @var $form yii\widgets\ActiveForm */

?>

<div id="panel-option-values" class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-check-square-o"></i> Transaction Details</h3>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.form-options-body',
        'widgetItem' => '.form-options-item',
        'min' => 2,
        'insertButton' => '.add-item',
        'deleteButton' => '.delete-item',
        'model' => $trxdetailModels[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'coa_id',
            'debit',
            'credit'
        ],
    ]); ?>

    <table class="table table-bordered table-striped margin-b-none">
        <thead>
            <tr>
                <th style="width: 90px; text-align: center"></th>
                <th class="required">Head of Account</th>
                <th style="width: 188px;">Debit</th>
                <th style="width: 188px;">Credit</th>
                <th style="width: 90px; text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody class="form-options-body">
            <?php foreach ($trxdetailModels as $index => $trxdetailModel): ?>
                <tr class="form-options-item">
                    <td class="sortable-handle text-center vcenter" style="cursor: move;">
                        <i class="fa fa-arrows"></i>
                    </td>
                    <td class="vcenter">
                        <?= $form->field($trxdetailModel, "[{$index}]coa_id")->label(false)->textInput(['maxlength' => 128]); ?>
                    </td>
                    <td>
                        <?php if (!$trxdetailModel->isNewRecord): ?>
                            <?= Html::activeHiddenInput($trxdetailModel, "[{$index}]id"); ?>
                            <?= Html::activeHiddenInput($trxdetailModel, "[{$index}]coa_id"); ?>
                            <?= Html::activeHiddenInput($trxdetailModel, "[{$index}]debit"); ?>
                            <?= Html::activeHiddenInput($trxdetailModel, "[{$index}]credit"); ?>
                        <?php endif; ?>

                        <?= $form->field($trxdetailModel, "[{$index}]debit")->label(false)->textInput(); ?>
                    </td>
                    <td>
                        <?= $form->field($trxdetailModel, "[{$index}]credit")->label(false)->textInput(); ?>
                    </td>
                    <td class="text-center vcenter">
                        <button type="button" class="delete-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> New Line</button></td>
            </tr>
        </tfoot>
    </table>
    <?php DynamicFormWidget::end(); ?>
</div>

<?php
$js = <<<'EOD'

var fixHelperSortable = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$(".form-options-body").sortable({
    items: "tr",
    cursor: "move",
    opacity: 0.6,
    axis: "y",
    handle: ".sortable-handle",
    helper: fixHelperSortable,
    update: function(ev){
        $(".dynamicform_wrapper").yiiDynamicForm("updateContainer");
    }
}).disableSelection();

EOD;

JuiAsset::register($this);
$this->registerJs($js);
?>