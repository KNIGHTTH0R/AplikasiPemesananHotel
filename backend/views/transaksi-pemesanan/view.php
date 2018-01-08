<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiPemesanan */

$this->title = $model->TANGGAL;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-pemesanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TRANSAKSI_PESAN',
            'PEMESANAN_ID',
            'TANGGAL',
            'KETERANGAN',
            'NO_KAMAR',
        ],
    ]) ?>

</div>
