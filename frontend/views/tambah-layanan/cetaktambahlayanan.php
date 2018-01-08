<?php
use yii\helpers\Html;
?>
<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Ini adalah ID Tambah Layanan anda!</p>
<p></p>
<p></p>
<p></p>
<p></p>
<?php
//var_dump($dataProvider);
//
$total=0;
foreach ($models as $x) {
	$id = $x->ID_TAMBAHLAYANAN;
	$kamar = $x->transaksi->pemesanan->kamar->hotel->NAMA_HOTEL . ' - ' . $x->transaksi->pemesanan->kamar->NAMA_KAMAR;
    $tipe = $x->transaksi->pemesanan->kamar->TIPE_KAMAR;
    $fasilitas = $x->transaksi->pemesanan->kamar->FASILITAS;
    $tanggal = $x->TANGGAL;
	$kode = $x->transaksi->PEMESANAN_ID;
    $layanan = $x->NAMA_LAYANAN;
    $harga = Yii::$app->formatter->asCurrency($x->HARGA);
    $jumlah = $x->JUMLAH_LAYANAN . ' Layanan';
    $no_kamar = $x->NO_KAMAR;
    $status = $x->STATUS;
    $gambar = $x->transaksi->pemesanan->kamar->hotel->GAMBAR;
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
      <th><?= Html::img(Yii::getAlias('@imageurl')."/hotel/".$gambar, ['width' => '200px']) ?></th>
      <td>
        <p><b><?= $layanan ?></b></p>
        <p>Nomor Kamar  : <?= $no_kamar ?></p>
        <p>Kamar        : <?= $kamar ?></p>
        <p>Tipe Kamar   : <?= $tipe ?></p>
        <p>Fasilitas    : <?= $fasilitas ?></p>
        <p>-----------------------------------------------------------------------------------</p>
      </td>
    </tr>
  </tbody>
</table>

<table class="table table-sm">
  <thead>
    <tr>
      <th>ID Tambah Layanan</th>
      <th>Tanggal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?= $id ?></th>
      <td><?= Yii::$app->formatter->asDate($tanggal, 'dd MMMM Y') ?></td>
    </tr>
    <tr>
      <th>Total Harga :</th>
      <th><?= $harga?></th>
    </tr>
  </tbody>
</table>

