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
                'label' => 'ID Tambah Layanan',
                'value' => $model->KETERANGAN,
            ],
            [
                'label' => 'Tanggal Pesan',
                'value' => Yii::$app->formatter->asDate($model->keterangan->TANGGAL, 'dd MMMM Y'),
            ],
            [
                'label' => 'Nama Pemesan',
                'value' => $model->NAMA_PEMILIK,
            ],
            [
                'label' => 'Nama Layanan',
                'value' => $model->keterangan->NAMA_LAYANAN,
            ],
            [
                'label' => 'Jumlah Layanan',
                'value' => $model->keterangan->JUMLAH_LAYANAN,
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
