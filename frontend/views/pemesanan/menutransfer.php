<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orlando.com';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-index col-lg-6">

    <h4><center>Pembayaran via ATM</center></h4>
    <?php echo $this->render('pembayarantransfer'); ?>

</div>
<p>
<div class="col-lg-1"></div>
<div class="container-fluid thumbnail col-lg-6 button-shadow">
    <div class="col-lg-4">
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Kode Pesanan</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Check-In</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Check-Out</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Nama Hotel</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Nama</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Harga</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Malam</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Jumlah Kamar</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Total Harga</font></b></p>
            <div class="col-xs-1"></div>
            <p align="justify"><b><font size="3">Gambar</font></b></p>
    </div>

    <div class="col-lg-5">
            <p align="justify"><font size="3"><?= Html::encode($model->ID_PEMESANAN) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode(Yii::$app->formatter->asDate($model->TANGGAL_MASUK, 'dd MMMM Y')) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode(Yii::$app->formatter->asDate($model->TANGGAL_KELUAR, 'dd MMMM Y')) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode($model->kamar->hotel->NAMA_HOTEL) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode($model->NAMA) ?></font></p>
            <p align="justify"><font size="3"><?= Yii::$app->formatter->asCurrency($model->kamar->HARGA) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode($model->JUMLAH_HARI). ' Malam' ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode($model->JUMLAH_KAMAR) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode(Yii::$app->formatter->asCurrency($model->kamar->HARGA*$model->JUMLAH_HARI*$model->JUMLAH_KAMAR)) ?></font></p>
            <p align="justify"><?= Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->kamar->hotel->GAMBAR, ['class' => 'image-size']) ?></p>
    </div>

    <center><?= Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Bukti Pemesanan' , ['cetakpemesanan', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary','target' => '_blank']); ?></center>

</div>

</p>

