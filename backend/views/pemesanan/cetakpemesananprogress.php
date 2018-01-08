<?php
use yii\grid\GridView;
?>

<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Laporan Pemesanan Dalam Proses</p>
<p></p>
<p></p>
<p></p>
<p></p>
   <?= GridView::widget([
        'dataProvider' => $dataProviderbaru,
        'summary' => false,
        //'filterModel' => $searchModel,
        'columns' => [

            'ID_PEMESANAN',
            [
                'label' => 'Hotel',
                'attribute'=>'NAMA_HOTEL',
                'value'=>'kamar.hotel.NAMA_HOTEL',
            ],
            //'TANGGAL_MASUK',
            'TANGGAL_PESAN',
            //'TANGGAL_KELUAR',
            //'JUMLAH_HARI',
            //'JUMLAH_KAMAR',
            'NO_IDENTITAS',
            'NAMA',
            //'ALAMAT',
            //'NO_TELP',
            'EMAIL:email',
            'STATUS',
            //'KETERANGAN',
        ],
    ]); ?>

Disetujui Oleh
<p></p>
<p></p>
<p></p>
<p></p>
________________