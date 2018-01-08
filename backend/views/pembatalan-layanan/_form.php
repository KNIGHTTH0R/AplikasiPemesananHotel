<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PembatalanLayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembatalan-layanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TAMBAHLAYANAN_ID')->textInput() ?>

    <?= $form->field($model, 'NO_KAMAR')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
