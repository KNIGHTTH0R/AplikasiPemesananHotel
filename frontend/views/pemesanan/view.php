<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */

$this->title = 'Orlando.com';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p><div class="pemesanan-view thumbnail button-shadow">

<?php if($model->STATUS == 'In Progress') { ?>
    <center><b><font size="4">Waktu Pembayaran : </font></b></center>
    <p align="center"><font size="20"><b>
    <?php 
    $tanggal = strtotime($model->TANGGAL_PESAN);
    $tambah = $tanggal + (time() + 7200);
    $expired = date('Y-m-d H:i:s O',$tambah);

    echo \russ666\widgets\Countdown::widget([
        'datetime' => $expired,
        'format' => '%H:%M:%S',
        'events' => [
            'finish' => 'function(){
                location.href = "http://localhost/hotel/frontend/web/index.php?r=pemesanan%2Fupdatestatus&id='.$model->ID_PEMESANAN.'"
            }',
        ],
    ]); 
    ?>
    </font></p></b>


    <p><center><?= Html::a('<span class="glyphicon glyphicon-inbox"></span> Bayar via ATM', ['pembayarantransfer', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary','target' => '_blank']) ?><?= Html::a('<span class="glyphicon glyphicon-credit-card"></span> Bayar via Kartu Kredit', ['pembayarankredit', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary' ,'target' => '_blank']) ?></center></p>
<?php } else {
    echo '';
} ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Kode Pemesanan',
                'value' => $model->ID_PEMESANAN,
            ],
            [
                'label' => 'Nama Hotel',
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

<?php if($model->STATUS == 'In Progress' OR $model->STATUS == 'Paid') { ?>
    <center><?= Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Bukti Pemesanan', ['cetakpemesanan', 'id' => $model->ID_PEMESANAN], ['class' => 'btn btn-primary','target' => '_blank']) ?></center>
<?php } else { ?>
    <center><?= Html::a('Halaman Utama', ['/catalog/menu'], ['class' => 'btn btn-primary']) ?></center>
<?php } ?>

</div></p>
    <p><i>*NB : </i></p>
    <p><i>-Simpan Kode Pemesanan untuk melakukan Transaksi Pembayaran dan Cek Pesanan</i></p>
    <p><i>-Simpan Kode Pemesanan untuk login pada Pelayanan Hotel</i></p>
