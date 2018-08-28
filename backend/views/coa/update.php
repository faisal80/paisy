<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Coa */

$this->title = 'Update Head of Account: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'CoA', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
