<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Edit User Profile';
?>
<h1><?= $this->title ?></h1>

<div class="fiscal-year-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_format')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
