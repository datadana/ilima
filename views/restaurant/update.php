<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Restaurant */

$this->title = 'Update Restaurant: ' . ' ' . $model->restaurant;
$this->params['breadcrumbs'][] = ['label' => 'Restaurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->restaurant]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="restaurant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
