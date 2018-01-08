<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
?>

<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Laporan Fasilitas Hotel</p>
<p></p>
<p></p>
<p></p>
<p></p>
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [

            'ID_FASILITAS',
            'NAMA_FASILITAS',
            'HOTEL_ID',
            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Gambar',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@imageurl') . "/fasilitas/" . $data['GAMBAR'],
                        ['width' => '50px']);
                    },
            ],
        ],
    ]); ?>

Disetujui Oleh
<p></p>
<p></p>
<p></p>
<p></p>
________________