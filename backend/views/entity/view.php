<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Entity */

$this->title = $model->entity_name;
$this->params['breadcrumbs'][] = ['label' => 'Entities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Entity', ['create'], ['class' => 'btn btn-success']) ?>
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
            'entity_name',
            'parent.entity_name:text:Parent Entity',
            'createdby.username:text:Created by',
            'created_at:datetime',
            'updatedby.username:text:Updated by',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
