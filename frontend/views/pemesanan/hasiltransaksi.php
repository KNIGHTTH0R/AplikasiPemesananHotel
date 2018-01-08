<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */

$this->title = 'Orlando.com';
?>
<p><div class="pemesanan-view jumbotron col s6 m6">

    <?php if($model->pemesanan->STATUS == 'Paid') { 
        echo Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Kode Transaksi', ['cetaktransaksi', 'id' => $model->PEMESANAN_ID], ['class' => 'btn btn-primary', 'target' => '_blank']);
        echo Html::a('<span class="glyphicon glyphicon-log-in"></span> Login Pelayanan Hotel',['logintransaksi'],['class' => 'btn btn-primary','target' => '_blank']);
    } else {
        echo Html::a('<span class="glyphicon glyphicon-card"></span> Bayar Sekarang', ['view', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary','target' => '_blank']);
    } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TRANSAKSI_PESAN',
            [
                'label' => 'Kode Pemesanan',
                'value' => $model->PEMESANAN_ID,
            ],
            [
                'label' => 'Tanggal',
                'value' => Yii::$app->formatter->asDate($model->TANGGAL, 'dd MMMM Y')
            ], 
            'KETERANGAN',
            [
                'label' => 'Nama Pemesan',
                'value' => $model->pemesanan->NAMA,
            ],
            [
                'label' => 'Nama Hotel',
                'value' => $model->pemesanan->kamar->hotel->NAMA_HOTEL . ' - ' . $model->pemesanan->kamar->NAMA_KAMAR,
            ],
            [
                'label' => 'Alamat Hotel',
                'value' => $model->pemesanan->kamar->hotel->ALAMAT_HOTEL,
            ],
            [
                'label' => 'Malam',
                'value' => $model->pemesanan->JUMLAH_HARI . ' Malam',
            ],
            [
                'label' => 'Jumlah Kamar',
                'value' => $model->pemesanan->JUMLAH_KAMAR,
            ],
            [
                'label' => 'Total Harga',
                'value' => Yii::$app->formatter->asCurrency($model->pemesanan->kamar->HARGA*$model->pemesanan->JUMLAH_HARI*$model->pemesanan->JUMLAH_KAMAR),
            ],
        ],
    ]) ?>

</div></p>
