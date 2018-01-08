<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>

<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Laporan Data Hotel</p>
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
                    return Html::img(Yii::getAlias('@imageurl') . "/hotel/" . $data['GAMBAR'],
                        ['width' => '100px']);
                    },
            ],
            'ID_HOTEL',
            'NAMA_HOTEL',
            'ALAMAT_HOTEL',
            [
                'label' => 'Wilayah',
                'attribute'=>'NAMA_WILAYAH',
                'value'=>'wilayah.NAMA_WILAYAH',
            ],
            // 'LAT',
            // 'LNG',
            'KETERANGAN',
        ],
    ]); ?>

Disetujui Oleh
<p></p>
<p></p>
<p></p>
<p></p>
________________