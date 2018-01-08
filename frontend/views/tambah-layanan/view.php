<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TambahLayanan */

$this->title = $model->transaksi->PEMESANAN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Tambah Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tambah-layanan-view">

    <center><h4>Tambah Layanan dari Kode Transaksi : <?= Html::encode($this->title) ?></h4></center>

    <?php if($model->STATUS == 'Belum Dibayar') { ?>
    <p><center><?= Html::a('<span class="glyphicon glyphicon-inbox"></span> Bayar via ATM', ['pembayarantransfer', 'id' => $model->ID_TAMBAHLAYANAN], ['class' => 'btn btn-primary','target' => '_blank']) ?><?= Html::a('<span class="glyphicon glyphicon-credit-card"></span> Bayar via Kartu Kredit', ['pembayarankredit', 'id' => $model->ID_TAMBAHLAYANAN], ['class' => 'btn btn-primary' ,'target' => '_blank']) ?></center></p>
    <?php } else {
        echo '';
    } ?>
    <center>
        <?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span> Kembali ke Halaman Transaksi' , ['/pemesanan/logintransaksi'], ['class' => 'btn btn-primary']);?>
    </center>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TAMBAHLAYANAN',
            [
                'label' => 'Tanggal',
                'value' => Yii::$app->formatter->asDate($model->TANGGAL, 'dd MMMM Y'),
            ],
            [
                'label' => 'Hotel',
                'value' => $model->transaksi->pemesanan->kamar->hotel->NAMA_HOTEL . ' - ' . $model->transaksi->pemesanan->kamar->NAMA_KAMAR,
            ],
            [
                'label' => 'Tipe Kamar',
                'value' => $model->transaksi->pemesanan->kamar->TIPE_KAMAR,
            ],
            [
                'label' => 'Fasilitas',
                'value' => $model->transaksi->pemesanan->kamar->FASILITAS,
            ],
            [
                'label' => 'Kode Pemesanan',
                'value' => $model->transaksi->PEMESANAN_ID,
            ],
            [
                'label' => 'Layanan',
                'value' => $model->NAMA_LAYANAN,
            ],
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($model->HARGA),
            ],
            [
                'label' => 'Jumlah Layanan',
                'value' => $model->JUMLAH_LAYANAN,
            ],
            [
                'label' => 'No Kamar',
                'value' => $model->NO_KAMAR,
            ],
            'STATUS',
        ],
    ]) ?>

    <center>
        <?= Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Struk Tambah Layanan' , ['cetaktambahlayanan', 'id' => $model->ID_TAMBAHLAYANAN], ['class' => 'btn btn-primary', 'target' => '_blank']);?>
    </center>

</div>
