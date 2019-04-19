<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BpsDetail */

$this->title = 'Update BPS Detail: ' . $model->bps;
$this->params['breadcrumbs'][] = ['label' => 'BPS Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bps-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
