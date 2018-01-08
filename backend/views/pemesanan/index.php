<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_searchbaru', ['model' => $searchModelbaru]); ?>
    <center><p><b><h4>Transaksi Detail In Progress</h4></b></p></center>
    <?= GridView::widget([
        'dataProvider' => $dataProviderbaru,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'kartik\grid\SerialColumn'],

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

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

    <p></p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <center><p><b><h4>Transaksi Detail Paid</h4></b></p></center>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'kartik\grid\SerialColumn'],

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

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

    <p></p>

    <?php echo $this->render('_searchbatal', ['model' => $searchModelbatal]); ?>
    <center><p><b><h4>Transaksi Detail Canceled</h4></b></p></center>
    <?= GridView::widget([
        'dataProvider' => $dataProviderbatal,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'kartik\grid\SerialColumn'],

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

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
