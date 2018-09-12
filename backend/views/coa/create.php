<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Coa */

$this->title = 'Create Head of Account';
$this->params['breadcrumbs'][] = ['label' => 'CoA', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coa-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
