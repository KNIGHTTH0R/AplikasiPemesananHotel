<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PembatalanPemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembatalan-pemesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NO_KAMAR')->textInput() ?>

    <center>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Input Nomor Kamar' : 'Input Nomor Kamar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>
    </center>

    <?php ActiveForm::end(); ?>

</div>
