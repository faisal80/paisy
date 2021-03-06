<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Entity */

$this->title = 'Update Entity: ' . $model->entity_name;
$this->params['breadcrumbs'][] = ['label' => 'Entities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->entity_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entity-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
