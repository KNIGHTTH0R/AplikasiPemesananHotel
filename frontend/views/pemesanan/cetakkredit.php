<?php
use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Ini adalah bukti pembayaran anda!</p>
<p></p>
<p></p>
<p></p>
<p></p>
<?php
//var_dump($dataProvider);

$total=0;
foreach ($models as $x) {
    $idkredit = $x->ID_KREDIT;
    $kode = $x->KETERANGAN;
    $namahotel = $x->keterangan->kamar->hotel['NAMA_HOTEL'] . ' - ' . $x->keterangan->kamar->NAMA_KAMAR;
    $tanggal = $x->keterangan->TANGGAL_PESAN;
    $checkin = $x->keterangan->TANGGAL_MASUK;
    $checkout = $x->keterangan->TANGGAL_KELUAR;
    $harga = Yii::$app->formatter->asCurrency($x->keterangan->kamar->HARGA*$x->keterangan->JUMLAH_HARI*$x->keterangan->JUMLAH_KAMAR);
    $nominal = Yii::$app->formatter->asCurrency($x->NOMINAL);
    $nama = $x->NAMA_PEMILIK;
    $status = $x->keterangan->STATUS;
    $alamathotel = $x->keterangan->kamar->hotel['ALAMAT_HOTEL'];
    $gambarhotel = $x->keterangan->kamar->hotel['GAMBAR'];
}

?>

<b><p align="center"><font size="5">Status Pembayaran : <i><?= $status ?></i></font></p></b>

<table class="table table-sm">
  <thead>
    <tr>
      <th>Kode Pemesanan</th>
      <th><?= $kode ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?= Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->keterangan->kamar->hotel['GAMBAR'], ['width' => '100px']) ?></th>
      <td>
        <p><b><?= $namahotel ?></b></p>
        <p><?= $alamathotel ?></p>
        <p>Check-in : <?= Yii::$app->formatter->asDate($checkin, 'dd MMMM Y') ?></p>
        <p>Check-out : <?= Yii::$app->formatter->asDate($checkout, 'dd MMMM Y') ?></p>
        <p>-----------------------------------------------------------------------------------</p>
      </td>
    </tr>
  </tbody>
</table>

<table class="table table-sm">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Tanggal Pesan</th>
      <th>Total Harga</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $nama ?></td>
      <td><?= Yii::$app->formatter->asDate($tanggal, 'dd MMMM Y') ?></td>
      <td><?= $harga?></td>
    </tr>
    <tr>
      <td></td>
      <th>Nominal Pembayaran :</th>
      <th><?= $nominal ?></th>
    </tr>
  </tbody>
</table>
<?php /* DetailView::widget([
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
    ])*/ ?>
    <p><i>*NB : </i></p>
    <p><i>-Simpan Kode Pemesanan untuk melakukan Transaksi Pembayaran dan Cek Pesanan</i></p>
    <p><i>-Simpan Kode Pemesanan untuk login pada Pelayanan Hotel</i></p>

