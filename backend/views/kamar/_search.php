<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KamarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kamar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_KAMAR') ?>

    <?= $form->field($model, 'NAMA_KAMAR') ?>

    <?= $form->field($model, 'TIPE_KAMAR') ?>

    <?= $form->field($model, 'FASILITAS') ?>

    <?= $form->field($model, 'KETERANGAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
