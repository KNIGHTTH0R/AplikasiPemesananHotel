<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<div class="col s7 m7">
    <div class="thumbnail well shadow">
     <div class="col s4 m4"></div>
     <div class="col s4 m4">
     <p align="justify">
        <h6><b>Kode Transaksi</b></h6>
        <h6><b>Kode Pemesanan</b></h6>
        <h6><b>Nama</b></h6>
        <h6><b>Tanggal Pemesanan</b></h6>
    </p>
    </div>
    <div class="col s6 m6">
    <p align="justify">
        <h6><?= Html::encode($model->ID_TRANSAKSI_PESAN) ?></h6>
        <h6><?= Html::encode($model->PEMESANAN_ID) ?></h6>
        <h6><?= Html::encode($model->pemesanan->NAMA) ?></h6>
        <h6><?= Html::encode(Yii::$app->formatter->asDate($model->TANGGAL, 'dd MMMM Y')) ?></h6>
    </p>
    </div>
        <center>
        <div class="row">
            <?= Html::a('<span class="glyphicon glyphicon-log-in"></span> Login Pelayanan Hotel' , ['viewsetelahkredit', 'id' => $model->ID_TRANSAKSI_PESAN], ['class' => 'btn btn-primary']);?>
        </div>
        </center>
    </div>
</div>