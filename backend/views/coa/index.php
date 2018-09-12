<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chart of Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Head of Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'coagrouping.group_name',
            'code',
            'title',
            'account_type',
            'parent.headofaccount:text:Parent Account',
            'remarks',
//            'createdby.username:text:Created by',
//            'created_at:datetime',
//            'updatedby.username:text:Updated by',
//            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
