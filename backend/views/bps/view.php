<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Bps */
/* @var $bpsDetail common\models\BpsDetail */

$this->title = 'Pay Scales: ' . $model->wef;
$this->params['breadcrumbs'][] = ['label' => 'BPS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bps-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Chart', ['chart', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'wef',
            'reference_no',
            'date',
            'department',
            'createdby.username:text:Created by',
            'created_at:datetime',
            'updatedby.username:text:Updated by',
            'updated_at:datetime',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $bpsDetail,
        'tableOptions' => ['class'=>'table table-striped table-hover table-bordered table-condensed'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'payScale.ps:text:Pay Scale',
            'bps',
            'minimum:decimal',
            'increment:decimal',
            'maximum:decimal',
//            'created_by',
//            'created_at',
//            'updated_by',
//            'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'bps-detail'
            ],
        ],
    ]); ?>
    
</div>
