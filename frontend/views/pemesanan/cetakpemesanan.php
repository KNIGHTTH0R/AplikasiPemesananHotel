<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Ini adalah bukti pemesanan anda!</p>
<p></p>
<p></p>
<p></p>
<p></p>
<?php
//var_dump($dataProvider);

$total=0;
foreach ($models as $x) {
  	$kode = $x->ID_PEMESANAN;
  	$namahotel = $x->kamar->hotel['NAMA_HOTEL'] . ' - ' . $x->kamar->NAMA_KAMAR;
    $checkin = $x->TANGGAL_MASUK;
    $checkout = $x->TANGGAL_KELUAR;
	  $malam = $x->JUMLAH_HARI. ' Malam';
    $jumlah = $x->JUMLAH_KAMAR;
    $harga = Yii::$app->formatter->asCurrency($x->kamar->HARGA*$x->JUMLAH_HARI*$x->JUMLAH_KAMAR);
    $nama = $x->NAMA;
    $status = $x->STATUS;
    $no = $x->NO_IDENTITAS;
    $alamat = $x->ALAMAT;
    $alamathotel = $x->kamar->hotel['ALAMAT_HOTEL'];
    $telp = $x->NO_TELP;
    $email = $x->EMAIL;
    $gambarhotel = $x->kamar->hotel['GAMBAR'];
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
      <th><?= Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->kamar->hotel['GAMBAR'], ['width' => '100px']) ?></th>
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
      <th>No Identitas</th>
      <th>Nama</th>
      <th>No Telepon</th>
      <th>Malam</th>
      <th>Kamar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $nama ?></td>
      <td><?= $telp ?></td>
      <td><?= $malam?></td>
      <td><?= $jumlah?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <th>Total :</th>
      <th><?= $harga?></th>
    </tr>
  </tbody>
</table>

<?php /* DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PEMESANAN',
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
    ]) */?>
    <p><i>*NB : </i></p>
    <p><i>-Simpan Kode Pemesanan untuk melakukan Transaksi Pembayaran dan Cek Pesanan</i></p>
    <p><i>-Simpan Kode Pemesanan untuk login pada Pelayanan Hotel</i></p>

