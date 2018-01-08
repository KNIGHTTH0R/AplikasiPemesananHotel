<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Kredit */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    .padding-baru {
        padding: 50px;
    }
    .input {
        background-color:   #1E90FF;
        color: white;
    }
</style>
<p>
<div class="kredit-form thumbnail padding-baru">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KARTU_NO')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-999-999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
    ]) ?>

    <?= $form->field($model, 'NAMA_PEMILIK')->textInput(['required' => true])->label('Nama') ?>

    <font size="2" color="#A9A9A9"><b>Tanggal Valid</b></font>
    <?= DatePicker::widget([
        'id' => 'checkin',
        'model' => $model,
        'attribute' => 'TANGGAL_VALID',
        'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy',
                'startDate' => date('d-M-Y'),
                'prepend' => '<i class="icon-calendar"></i>',
            ]
    ]);?>

    <?= $form->field($model, 'CVV_NO')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
    ])->label('CVV') ?>

    <?= $form->field($model, 'NOMINAL')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'KETERANGAN')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <center><?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-save"></span> Bayar Sekarang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-default' : 'btn btn-primary']) ?></center>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</p>
