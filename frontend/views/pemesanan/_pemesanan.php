<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<div class="col s8 m8">
    <div class="thumbnail shadow">
     <div class="col s6 m6">
     <p align="justify">
        <h6><b>Kode Pesanan</b></h6>
        <h6><b>Check - In</b></h6>
        <h6><b>Check - Out</b></h6>
        <h6><b>Hotel</b></h6>
        <h6><b>Alamat Hotel</b></h6>
        <h6><b>No Identitas</b></h6>
        <h6><b>Nama</b></h6>
        <h6><b>Status Pembayaran</b></h6>
    </p>
    </div>
    <div class="col s6 m6">
    <p align="justify">
        <h6><?= Html::encode($model->ID_PEMESANAN) ?></h6>
        <h6><?= Html::encode(Yii::$app->formatter->asDate($model->TANGGAL_MASUK, 'dd MMMM Y')) ?></h6>
        <h6><?= Html::encode(Yii::$app->formatter->asDate($model->TANGGAL_KELUAR, 'dd MMMM Y')) ?></h6>
        <h6><?= Html::encode($model->kamar->hotel->NAMA_HOTEL) ?></h6>
        <h6><?= Html::encode($model->kamar->hotel->ALAMAT_HOTEL) ?></h6>
        <h6><?= Html::encode($model->NO_IDENTITAS) ?></h6>
        <h6><?= Html::encode($model->NAMA) ?></h6>
        <h6><?= Html::encode($model->STATUS) ?></h6>
    </p>
    </div>
        <center>
        <div class="row">
            <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Lihat Pemesanan' , ['viewsetelahkredit', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary']);?>        </div>
        </center>
    </div>
</div>