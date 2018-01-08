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
    $nama = $x->keterangan->NAMA_LAYANAN;
    $tanggal = $x->keterangan->TANGGAL;
    $harga = Yii::$app->formatter->asCurrency($x->keterangan->HARGA);
    $nominal = Yii::$app->formatter->asCurrency($x->NOMINAL);
    $nama = $x->NAMA_PEMILIK;
    $status = $x->keterangan->STATUS;
}

?>

<b><p align="center"><font size="5">Status Pembayaran : <i><?= $status ?></i></font></p></b>

<table class="table table-sm">
  <thead>
    <tr>
      <th>ID Tambah Layanan</th>
      <th><?= $kode ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?= Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->keterangan->transaksi->pemesanan->kamar->hotel['GAMBAR'], ['width' => '100px']) ?></th>
      <td>
        <p><b>Kode Pembayaran : <?= $idkredit ?></b></p>
        <p><?= $nama ?></p>
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

