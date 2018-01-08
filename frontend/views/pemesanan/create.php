<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Pembayaran via Kartu Kredit';
?>    
<style type="text/css">
    .padding-baru {
        padding: 50px;
    }
    .input {
        background-color: #3CBC8D;
        color: white;
    }
</style>

<h4><center><?= Html::encode($this->title) ?></center></h4>
<div class="col-lg-1"></div>
<p>
<div class="pemesanan-create col-lg-4 button-shadow">

    <?= $this->render('pembayarankredit', [
        'model' => $model,
    ]) ?>

</div>
</p>
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
            <p align="justify"><font size="3"><?= Html::encode($pesanan->ID_PEMESANAN) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode(Yii::$app->formatter->asDate($pesanan->TANGGAL_MASUK, 'dd MMMM Y')) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode(Yii::$app->formatter->asDate($pesanan->TANGGAL_KELUAR, 'dd MMMM Y')) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode($pesanan->kamar->hotel->NAMA_HOTEL) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode($pesanan->NAMA) ?></font></p>
            <p align="justify"><font size="3"><?= Yii::$app->formatter->asCurrency($pesanan->kamar->HARGA) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode($pesanan->JUMLAH_HARI). ' Malam' ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode($pesanan->JUMLAH_KAMAR) ?></font></p>
            <p align="justify"><font size="3"><?= Html::encode(Yii::$app->formatter->asCurrency($pesanan->kamar->HARGA*$pesanan->JUMLAH_HARI*$pesanan->JUMLAH_KAMAR)) ?></font></p>
            <p align="justify"><?= Html::img(Yii::getAlias('@imageurl')."/hotel/".$pesanan->kamar->hotel->GAMBAR, ['class' => 'image-size']) ?></p>
    </div>

</div>
