<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bps */

$this->title = 'Create Bps';
$this->params['breadcrumbs'][] = ['label' => 'BPS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
