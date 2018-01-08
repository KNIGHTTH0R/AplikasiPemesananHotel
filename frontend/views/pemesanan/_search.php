<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PemesananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <center><?= $form->field($model, 'ID_PEMESANAN')->textInput(['required' => true])->label('Kode Pemesanan') ?></center>
    <div class="form-group">
        <center><?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Cek Pesanan', ['class' => 'btn btn-primary']) ?></center>
    </div>

    <?php ActiveForm::end(); ?>

</div>
