<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PembatalanPemesanan */

$this->title = 'Edit Pembatalan Pemesanan: ' . $model->PEMESANAN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Pembatalan Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PEMESANAN_ID, 'url' => ['view', 'id' => $model->PEMESANAN_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembatalan-pemesanan-update">

    <center><h1>Kode Pemesanan : <?= Html::encode($this->title) ?></h1></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
