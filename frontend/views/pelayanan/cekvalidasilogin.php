<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PemesananSearch */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Login Pelayanan Hotel';
?>

<div class="pemesanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['tampilpelayanan'],
        'method' => 'get',
    ]); ?>

<div class="padding-center col-lg-9">
<div class="panel panel-default button-shadow">
<div class="panel-heading">
<center>
	<p><h5><b><?= Html::encode($this->title) ?></b></h5></p>
    <p><h6>Silahkan Tambah Layanan Anda Disini</h6></p>
</center>
</div>
<center>
  <div class="panel-body">

    <?= $form->field($model, 'PEMESANAN_ID')->textInput(['required' => true])->Label('Masukkan Kode Pemesanan') ?>
    <div class="form-group">
        <center><?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Login Pelayanan Hotel', ['class' => 'btn btn-primary']) ?></center>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</center>
</div>
