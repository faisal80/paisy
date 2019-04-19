<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BudgetDetail */

$this->title = 'Create Budget Detail';
$this->params['breadcrumbs'][] = ['label' => 'Budget Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
