<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CoA Groupings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coa-grouping-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create CoA Grouping', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'group_name',
            'created_by' => [
                'attribute' => 'created_by',
                'value' => 'createdby.username',
            ],
            'created_at'=>[
                'attribute' => 'created_at',
                'format' => ['datetime'],
            ],
            'updated_by' => [
                'attribute' => 'updated_by',
                'value' => 'updatedby.username',
            ],
            'updated_at'=> [
                'attribute' => 'updated_at',
                'format'=> ['datetime'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
