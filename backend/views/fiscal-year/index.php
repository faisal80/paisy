<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fiscal Years';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fiscal-year-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Fiscal Year', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fiscal_year',
            'start_date',
            'end_date',
            'is_closed:boolean',
            'createdby.username:text:Created by',
            'created_at:datetime',
            'updatedby.username:text:Updated by',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
