<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<style type="text/css">
    .padding-text {
        padding-left: 220px;
    }
</style>
<?php if($model->STATUS == 'Aktif') { ?>
<div class="col s10 m10">
<center>
</center>
<div class="thumbnail shadow ">
    <div class="padding-text">
     <div class="col s4 m4">
     <p align="justify" class="">
        <h6><b>Kode Transaksi Anda</b></h6>
        <h6><b>Kode Pemesanan Anda</b></h6>
        <h6><b>Tanggal Transaksi</b></h6>
        <h6><b>Nama Anda</b></h6>
        <h6><b>Nama Hotel</b></h6>
        <h6><b>Tipe Kamar</b></h6>
        <h6><b>Fasilitas</b></h6>
    </p>
    </div>
    <div class="col s6 m6">
    <p align="justify">
        <h6><?= Html::encode($model->ID_TRANSAKSI_PESAN) ?></h6>
        <h6><?= Html::encode($model->PEMESANAN_ID) ?></h6>
        <h6><?= Html::encode(Yii::$app->formatter->asDate($model->TANGGAL, 'dd MMMM Y')) ?></h6>
        <h6><?= Html::encode($model->pemesanan->NAMA) ?></h6>
        <h6><?= Html::encode($model->pemesanan->kamar->hotel->NAMA_HOTEL) . ' - ' . Html::encode($model->pemesanan->kamar->NAMA_KAMAR) ?></h6>
        <h6><?= Html::encode($model->pemesanan->kamar->TIPE_KAMAR) ?></h6>
        <h6><?= Html::encode($model->pemesanan->kamar->FASILITAS) ?></h6>
    </p>
    </div>
</div>
        <center>
        <div class="row">
            <?= Html::a('<span class="glyphicon glyphicon-book"></span> Data Layanan Hotel' , ['/layanan/index'], ['class' => 'btn btn-primary']);?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Tambah Layanan Hotel' , ['/tambah-layanan/create', 'id' => $model->PEMESANAN_ID], ['class' => 'btn btn-primary']);?>
            <?= Html::a('<span class="glyphicon glyphicon-search"></span> Cek Tambah Layanan' , ['/tambah-layanan/search'], ['class' => 'btn btn-primary']);?>
        </div>
        </center>
    </div>
</div>
<?php } else { echo 'Kode Transaksi Tidak Aktif'; } ?>