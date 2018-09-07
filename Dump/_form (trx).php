<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $trxdetailModels[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'coa_id',
            'debit',
            'credit',
        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Transaction Details
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add line</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($trxdetailModels as $index => $trxdetailModel): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$trxdetailModel->isNewRecord) {
                                echo Html::activeHiddenInput($trxdetailModel, "[{$index}]id");
                            }
                        ?>
                        
                        <div class="row">
                            <div class="col-sm-2">
                                <?= $form->field($trxdetailModel, "[{$index}]coa_id")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-3">
                                <?= $form->field($trxdetailModel, "[{$index}]debit")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-3">
                                <?= $form->field($trxdetailModel, "[{$index}]credit")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
