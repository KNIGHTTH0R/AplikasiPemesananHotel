<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Nasabah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nasabah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NO_REKENING')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '99999999999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
    ]) ?>

    <?= $form->field($model, 'NO_KARTU')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-999-999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
    ]) ?>

    <p><font size="2" color="#000000"><b>Tanggal Valid</b></font>
    <?= DatePicker::widget([
        'id' => 'checkin',
        'model' => $model,
        'attribute' => 'TANGGAL_VALID',
        'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'd-M-yyyy',
                'startDate' => date('d-M-Y'),
                'prepend' => '<i class="icon-calendar"></i>',
            ]
    ]);?></p>

    <?= $form->field($model, 'CVV')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
    ]) ?>

    <?= $form->field($model, 'NAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BANK_ID')->textInput() ?>

    <?= $form->field($model, 'SALDO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
