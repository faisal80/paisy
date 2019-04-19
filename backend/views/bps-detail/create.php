<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BpsDetail */

$this->title = 'Create BPS Detail';
$this->params['breadcrumbs'][] = ['label' => 'BPS Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bps-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
