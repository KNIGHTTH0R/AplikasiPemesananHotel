<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kredit */

$this->title = 'Orlando.com';
?>
<p><div class="kredit-view thumbnail button-shadow">

    <center><h4><?= Html::encode($model->NAMA_PEMILIK) ?></h4></center>

    <center><?php /* Html::a('<span class="glyphicon glyphicon-eye-open"></span> Lihat Kode Transaksi', ['index'], ['class' => 'btn btn-primary', 'target' => '_blank']) */?></center>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //[
            //    'label' => 'Kode Pembayaran',
            //    'value' => $model->ID_KREDIT,
            //],
            [
                'label' => 'Kode Pemesanan',
                'value' => $model->KETERANGAN,
            ],
            [
                'label' => 'Tanggal Pesan',
                'value' => Yii::$app->formatter->asDate($model->keterangan->TANGGAL_PESAN, 'dd MMMM Y'),
            ],
            [
                'label' => 'Nama Pemesan',
                'value' => $model->NAMA_PEMILIK,
            ],
            [
                'label' => 'Nama Hotel',
                'value' => $model->keterangan->kamar->hotel->NAMA_HOTEL . ' - ' . $model->keterangan->kamar->NAMA_KAMAR,
            ],
            [
                'label' => 'Malam',
                'value' => $model->keterangan->JUMLAH_HARI . ' Malam',
            ],
            [
                'label' => 'Jumlah Kamar',
                'value' => $model->keterangan->JUMLAH_KAMAR,
            ],
            [
                'label' => 'Status Pembayaran',
                'value' => $model->keterangan->STATUS,
            ],
            [
                'label' => 'Nominal',
                'value' => $model->NOMINAL,
                'format' => 'Currency',
            ],
        ],
    ]) ?>
    <center><?= Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Bukti Pembayaran', ['cetakkredit', 'id' => $model->ID_KREDIT], ['class' => 'btn btn-primary', 'target' => '_blank']) ?></center>

</div></p>
    <p><i>*NB : </i></p>
    <p><i>-Simpan Kode Pemesanan untuk melakukan Transaksi Pembayaran dan Cek Pesanan</i></p>
    <p><i>-Simpan Kode Pemesanan untuk login pada Pelayanan Hotel</i></p>
