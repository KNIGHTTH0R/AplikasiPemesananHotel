<?php
use yii\widgets\DetailView;
use yii\helpers\Html;
?>

<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Ini adalah bukti transaksi anda!</p>
<p></p>
<p></p>
<p></p>
<p></p>
<?php
//var_dump($dataProvider);

$total=0;
foreach ($models as $x) {
    $id = $x->ID_TRANSAKSI_PESAN;
    $kode = $x->PEMESANAN_ID;
    $namahotel = $x->pemesanan->kamar->hotel['NAMA_HOTEL'] . ' - ' . $x->pemesanan->kamar->NAMA_KAMAR;
    $tanggal = $x->TANGGAL;
    $checkin = $x->pemesanan->TANGGAL_MASUK;
    $checkout = $x->pemesanan->TANGGAL_KELUAR;
    $harga = Yii::$app->formatter->asCurrency($x->pemesanan->kamar->HARGA*$x->pemesanan->JUMLAH_HARI*$x->pemesanan->JUMLAH_KAMAR);
    $nama = $x->pemesanan->NAMA;
    $status = $x->KETERANGAN;
    $alamathotel = $x->pemesanan->kamar->hotel['ALAMAT_HOTEL'];
    $gambarhotel = $x->pemesanan->kamar->hotel['GAMBAR'];
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
      <th><?= Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->pemesanan->kamar->hotel['GAMBAR'], ['width' => '100px']) ?></th>
      <td>
        <p><b><?= $namahotel ?></b></p>
        <p><?= $alamathotel ?></p>
        <p>Check -in : <?= Yii::$app->formatter->asDate($checkin, 'dd MMMM Y') ?></p>
        <p>Check-out : <?= Yii::$app->formatter->asDate($checkout, 'dd MMMM Y') ?></p>
        <p>-----------------------------------------------------------------------------------</p>
      </td>
    </tr>
  </tbody>
</table>

<table class="table table-sm">
  <thead>
    <tr>
      <th>Kode Transaksi</th>
      <th>Nama</th>
      <th>Tanggal Transaksi</th>
      <th>Total Harga</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $id ?></td>
      <td><?= $nama ?></td>
      <td><?= Yii::$app->formatter->asDate($tanggal, 'dd MMMM Y') ?></td>
      <td><?= $harga?></td>
    </tr>
  </tbody>
</table>

<?php /* DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TRANSAKSI_PESAN',
            [
                'label' => 'Tanggal',
                'value' => Yii::$app->formatter->asDate($model->TANGGAL, 'dd MMMM Y')
            ],
            [
                'label' => 'Status Pembayaran',
                'value' => $model->KETERANGAN,
            ],
            [
                'label' => 'Nama Pemesan',
                'value' => $model->pemesanan->NAMA,
            ],
            [
                'label' => 'Nama',
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
    ]) */?>

    <p><i>*NB : </i></p>
    <p><i>-Simpan Kode Pemesanan untuk melakukan Transaksi Pembayaran dan Cek Pesanan</i></p>
    <p><i>-Simpan Kode Pemesanan untuk login pada Pelayanan Hotel</i></p>

