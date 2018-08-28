<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CoaGrouping */

$this->title = 'Create CoA Grouping';
$this->params['breadcrumbs'][] = ['label' => 'CoA Groupings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coa-grouping-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
