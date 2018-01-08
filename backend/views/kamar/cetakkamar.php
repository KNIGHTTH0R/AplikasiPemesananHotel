<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>

<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Laporan Data Kamar</p>
<p></p>
<p></p>
<p></p>
<p></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [

            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Gambar',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@imageurl') . "/kamar/" . $data['GAMBAR'],
                        ['width' => '100px']);
                    },
            ],
            'ID_KAMAR',
            'NAMA_KAMAR',
            'HOTEL_ID',
            'TIPE_KAMAR',
            'HARGA',
            'STOK_KAMAR',
            'FASILITAS',
            'KETERANGAN',
        ],
    ]); ?>

Disetujui Oleh
<p></p>
<p></p>
<p></p>
<p></p>
________________