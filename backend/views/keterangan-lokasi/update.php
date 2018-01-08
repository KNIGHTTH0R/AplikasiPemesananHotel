<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KeteranganLokasi */

$this->title = 'Edit Keterangan Lokasi: ' . $model->NAMA_KETERANGAN;
$this->params['breadcrumbs'][] = ['label' => 'Keterangan Lokasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_KETERANGAN, 'url' => ['view', 'id' => $model->ID_KETERANGAN]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="keterangan-lokasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
