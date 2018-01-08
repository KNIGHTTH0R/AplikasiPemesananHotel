<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TambahLayananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tambah-layanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_TAMBAHLAYANAN') ?>

    <?= $form->field($model, 'TANGGAL') ?>

    <?= $form->field($model, 'TRANSAKSI_ID') ?>

    <?= $form->field($model, 'LAYANAN_ID') ?>

    <?= $form->field($model, 'JUMLAH_LAYANAN') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
