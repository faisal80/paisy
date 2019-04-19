<?php
/* @var $this yii\web\View */
/* @var $model common\models\User */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'User Profile';
?>
<h1><?= $this->title ?></h1>

    <p>
        <?= Html::a('Edit', ['edit', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
            'date_format',
        ],
    ]) ?>
