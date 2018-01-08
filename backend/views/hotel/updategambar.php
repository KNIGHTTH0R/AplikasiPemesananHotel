<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hotel */

$this->title = 'Edit Gambar Hotel: ' . $model->NAMA_HOTEL;
$this->params['breadcrumbs'][] = ['label' => 'Hotel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_HOTEL, 'url' => ['view', 'id' => $model->ID_HOTEL]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formgambar', [
        'model' => $model,
    ]) ?>

</div>
