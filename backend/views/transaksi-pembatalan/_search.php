<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransaksiPembatalanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-pembatalan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_TRANSAKSI_BATAL') ?>

    <?= $form->field($model, 'PEMESANAN_ID') ?>

    <?= $form->field($model, 'NO_IDENTITAS') ?>

    <?= $form->field($model, 'TANGGAL_BATAL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
