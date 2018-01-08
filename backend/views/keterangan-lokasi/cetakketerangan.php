<?php
use yii\grid\GridView;
?>

<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Laporan Tempat Menarik</p>
<p></p>
<p></p>
<p></p>
<p></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [

            'ID_KETERANGAN',
            'NAMA_KETERANGAN',
            'HOTEL_ID',

        ],
    ]); ?>

Disetujui Oleh
<p></p>
<p></p>
<p></p>
<p></p>
________________