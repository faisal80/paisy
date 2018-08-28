<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FiscalYear */

$this->title = 'Update Fiscal Year: ' . $model->fiscal_year;
$this->params['breadcrumbs'][] = ['label' => 'Fiscal Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fiscal_year, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fiscal-year-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
