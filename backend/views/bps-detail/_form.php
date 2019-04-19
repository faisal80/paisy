<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BpsDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bps-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bps_id')->dropDownList(common\models\Bps::getAll()) ?>

    <?= $form->field($model, 'bps')->textInput() ?>

    <?= $form->field($model, 'minimum')->textInput() ?>

    <?= $form->field($model, 'increment')->textInput() ?>

    <?= $form->field($model, 'maximum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
