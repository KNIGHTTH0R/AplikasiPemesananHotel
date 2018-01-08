<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */

$this->title = 'Orlando.com';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p><div class="pemesanan-view jumbotron">

    <?php if($model->STATUS == 'Paid') { 
        echo Html::a('<span class="glyphicon glyphicon-eye-open"></span> Lihat Kode Transaksi', ['cektransaksi', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary']);
    } else { 
         echo Html::a('<span class="glyphicon glyphicon-credit-card"></span> Bayar Sekarang', ['view', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary','target' => '_blank']);

        } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Kode Pemesanan',
                'value' => $model->ID_PEMESANAN,
            ],
            [
                'label' => 'Nama Kamar',
                'value' => $model->kamar->hotel->NAMA_HOTEL . ' - ' . $model->kamar->NAMA_KAMAR,
            ],
            [
                'label' => 'Check In',
                'value' => Yii::$app->formatter->asDate($model->TANGGAL_MASUK, 'dd MMMM Y'),
            ],
            [
                'label' => 'Check Out',
                'value' => Yii::$app->formatter->asDate($model->TANGGAL_KELUAR, 'dd MMMM Y'),
            ],
            'NO_IDENTITAS',
            'NAMA', 
            'ALAMAT',
            'NO_TELP',
            'EMAIL:email',
            [
                'label' => 'Status Pembayaran',
                'value' => $model->STATUS,
            ],
            [
                'label' => 'Malam',
                'value' => $model->JUMLAH_HARI . ' Malam',
            ],
            [
                'label' => 'Jumlah Kamar',
                'value' => $model->JUMLAH_KAMAR,
            ],
            [
                'label' => 'Total Harga',
                'value' => Yii::$app->formatter->asCurrency($model->kamar->HARGA*$model->JUMLAH_HARI*$model->JUMLAH_KAMAR),
            ],
        ],
    ]) ?>

    <?php if($model->STATUS == 'Paid') { 
         echo Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Bukti Pemesanan' , ['cetakpemesanan', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary','target' => '_blank']);
    } else { 
         echo Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Bukti Pemesanan' , ['cetakpemesanan', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary','target' => '_blank']);

        } ?>

</div></p>
    <p><i>*NB : </i></p>
    <p><i>-Simpan Kode Pemesanan untuk melakukan Transaksi Pembayaran dan Cek Pesanan</i></p>
    <p><i>-Simpan Kode Pemesanan untuk login pada Pelayanan Hotel</i></p>
