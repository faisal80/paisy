<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $trxModel common\models\Trx */
/* @var $trxdetailModels common\models\Trxdetail */

$this->title = 'Update Trx: ' . $trxModel->id;
$this->params['breadcrumbs'][] = ['label' => 'Trxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $trxModel->id, 'url' => ['view', 'id' => $trxModel->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trx-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'trxModel' => $trxModel,
        'trxdetailModels' => $trxdetailModels,
    ]) ?>

</div>
