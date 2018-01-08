<?php
use yii\grid\GridView;
?>

<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Laporan Transaksi Pemesanan</p>
<p></p>
<p></p>
<p></p>
<p></p>
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [

            'ID_TAMBAHLAYANAN',
            'TANGGAL',
            'TRANSAKSI_ID',
            'LAYANAN_ID',
            'JUMLAH_LAYANAN',
            // 'STATUS',

        ],
    ]); ?>

Disetujui Oleh
<p></p>
<p></p>
<p></p>
<p></p>
________________