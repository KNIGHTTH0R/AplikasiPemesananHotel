<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hotel */

$this->title = 'Edit Gambar Layanan: ' . $model->NAMA_LAYANAN;
$this->params['breadcrumbs'][] = ['label' => 'Hotel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_LAYANAN, 'url' => ['view', 'id' => $model->ID_LAYANAN]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formgambar', [
        'model' => $model,
    ]) ?>

</div>
