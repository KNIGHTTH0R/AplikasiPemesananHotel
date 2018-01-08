<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\TransaksiPemesananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-pemesanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="col-lg-6">
    <?= $form->field($model, 'ID_TRANSAKSI_PESAN') ?>
    </div>
    <div class="col-lg-6">
    <?= $form->field($model, 'PEMESANAN_ID') ?>
    </div>

    <p>
    <div class="form-group">
        <center><?= Html::submitButton('Cari Transaksi', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Cetak Laporan', ['cetaktransaksi'], ['class' => 'btn btn-default','target' => '_blank']) ?></center>
    </div>
    </p>

    <?php ActiveForm::end(); ?>

</div>
