<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Func */

$this->title = 'Create Function';
$this->params['breadcrumbs'][] = ['label' => 'Functions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="func-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
