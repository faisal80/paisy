<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $trxModel common\models\Trx */
/* @var $trxdetailModels commom\models\Trxdetails */

$this->title = 'Create Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trx-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'trxModel' => $trxModel,
        'trxdetailModels' => $trxdetailModels,
    ]) ?>

</div>
