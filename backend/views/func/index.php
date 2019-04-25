<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Functions of Organization';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="func-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Function', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Preview Tree', ['func-tree'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'func_name',
            'parent.func_name:text:Parent Function',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
