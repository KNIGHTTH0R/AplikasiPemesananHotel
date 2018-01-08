<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KreditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tambah Layanan Hotel';
?>
<div class="layanan-index">

<div class="thumbnail shadow">

<center><h4><?= Html::encode($this->title) ?></h4></center>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            [
                'label' => 'ID Tambah Layanan',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->ID_TAMBAHLAYANAN;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'Tanggal',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return Yii::$app->formatter->asDate($data->TANGGAL, 'dd MMMM Y');
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'Hotel',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->transaksi->pemesanan->kamar->hotel->NAMA_HOTEL . ' - ' . $data->transaksi->pemesanan->kamar->NAMA_KAMAR;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'Tipe Kamar',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->transaksi->pemesanan->kamar->TIPE_KAMAR;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'Fasilitas',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->transaksi->pemesanan->kamar->FASILITAS;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'Layanan',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->NAMA_LAYANAN;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
            	'label' => 'Kode Transaksi',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->transaksi->PEMESANAN_ID;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'Harga',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return Yii::$app->formatter->asCurrency($data->HARGA);
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'Jumlah Layanan',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->JUMLAH_LAYANAN;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'No Kamar',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->NO_KAMAR;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
            [
                'label' => 'Status',
                'value' => function($data) {
                    if($data->transaksi->STATUS == 'Aktif')
                    {
                        return $data->STATUS;
                    }
                    else
                    {   
                        return 'Kode Transaksi Tidak Aktif';
                    }
                },
            ],
        ],
    ]); ?>
</div>
</div>
