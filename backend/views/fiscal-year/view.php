<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\FiscalYear */

$this->title = 'Fiscal Year: '. $model->fiscal_year;
$this->params['breadcrumbs'][] = ['label' => 'Fiscal Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fiscal-year-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fiscal Year', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fiscal_year',
            'start_date',
            'end_date',
            'is_closed:boolean',
            'createdby.username:text:Created by',
            'created_at:datetime',
            'updatedby.username:text:Updated by',
            'updated_at:datetime',
        ],
    ]) ?>

    <p>
        <h2><?= Html::encode('Accounting Periods for Financial Year ' . $model->fiscal_year) ?></h2>
        <?php 
            if($accountingPeriods->totalCount === 0) {
                echo Html::a('Create Accounting Periods', ['create-accounting-periods', 'id' => $model->id], ['class' => 'btn btn-success']);
            }
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $accountingPeriods,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fiscalYear.fiscal_year',
            'period',
            'start_date',
            'end_date',
            'is_closed:boolean',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'accounting-period',
            ],
        ],
    ]); ?>

</div>
