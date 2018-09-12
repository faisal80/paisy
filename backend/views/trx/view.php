<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $trx common\models\Trx */
/* @var $trxdetail common\models\Trxdetail */

$this->title = $trx->id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trx-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Create Transaction', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $trx->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $trx->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $trx,
        'attributes' => [
            'id',
            'accountingPeriod.accountingPeriod:text:Accounting Period',
            'description',
            'trx_date',
            'amount',
            'balanced:boolean',
            'entity.entity_name',
            'func.func_name',
            'fund.fund_name',
            'createdby.username:text:Created by',
            'created_at:datetime',
            'updatedby.username:text:Updated by',
            'updated_at:datetime',
        ],
    ]) ?>

        <?= GridView::widget([
        'dataProvider' => $trxdetail,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'coa.headofaccount:text:Head of Account',
            [
                'attribute' => 'debit',
                'format' => 'currency',
                'footer' => $trxdetail->query->sum('debit'),
            ],
            'credit:currency',
            'createdby.username:text:Created by',
            'created_at:datetime',
            'updatedby.username:text:Updated by',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
