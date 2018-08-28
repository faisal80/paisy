<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CoaGrouping */

$this->title = 'Update Coa Grouping: ' . $model->group_name;
$this->params['breadcrumbs'][] = ['label' => 'CoA Groupings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coa-grouping-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
