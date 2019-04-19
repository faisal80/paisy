<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bps */

$this->title = 'Update Bps: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'BPS', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bps-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
