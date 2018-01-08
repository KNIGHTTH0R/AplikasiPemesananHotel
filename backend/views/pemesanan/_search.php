<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PemesananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="col-lg-6">
    <?php echo $form->field($model, 'ID_PEMESANAN') ?>
    </div>

    <div class="col-lg-6">
    <?php echo $form->field($model, 'NO_IDENTITAS') ?>
    </div>

    <div class="form-group">
        <center><?= Html::submitButton('Cari Pesanan', ['class' => 'btn btn-primary']) ?>
            
    <?= Html::a('Cetak Laporan', ['cetakpemesananpaid'], ['class' => 'btn btn-default','target' => '_blank']) ?>
        </center>
    </div>

    <?php ActiveForm::end(); ?>

</div>
