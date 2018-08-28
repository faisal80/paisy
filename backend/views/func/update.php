<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Func */

$this->title = 'Update Function: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Functions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="func-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
