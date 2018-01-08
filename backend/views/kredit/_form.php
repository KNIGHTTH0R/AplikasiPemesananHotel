<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Kredit */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-sm-3"></div>
<div class="kredit-form thumbnail padding-baru col-sm-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KARTU_NO')->textInput() ?>

    <?= $form->field($model, 'NAMA_PEMILIK')->textInput() ?>

    <font size="2"><b>Tanggal Valid</b></font>
    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => 'TANGGAL_VALID',
        'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yy'
            ]
    ]);?>

    <?= $form->field($model, 'CVV_NO')->textInput() ?>

    <?= $form->field($model, 'NOMINAL')->textInput() ?>

    <?= $form->field($model, 'KETERANGAN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Bayar Sekarang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
