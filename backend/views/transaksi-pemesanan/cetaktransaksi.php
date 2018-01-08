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
        //'filterModel' => $searchModel,
        'columns' => [

            'ID_TRANSAKSI_PESAN',
            'PEMESANAN_ID',
            'TANGGAL',
            'KETERANGAN',

        ],
    ]); ?>

Disetujui Oleh
<p></p>
<p></p>
<p></p>
<p></p>
________________