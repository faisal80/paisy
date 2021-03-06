<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AccountingPeriod */

$this->title = 'Update Accounting Period: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Accounting Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accounting-period-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
