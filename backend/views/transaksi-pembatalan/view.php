<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiPembatalan */

$this->title = $model->PEMESANAN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Pembatalan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-pembatalan-view">

    <h1>Kode Pemesanan : <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TRANSAKSI_BATAL',
            'PEMESANAN_ID',
            'NO_IDENTITAS',
            'TANGGAL_BATAL',
        ],
    ]) ?>

</div>
