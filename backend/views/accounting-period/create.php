<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AccountingPeriod */

$this->title = 'Create Accounting Period';
$this->params['breadcrumbs'][] = ['label' => 'Accounting Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accounting-period-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
