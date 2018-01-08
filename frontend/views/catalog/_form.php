<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    .padding-baru {
        padding: 30px;
    }
    .input {
        background-color:   #1E90FF;
        color: white;
    }
</style>

<div class="pemesanan-form thumbnail padding-baru col-sm-6 button-shadow">

    <?php $form = ActiveForm::begin(['id' => 'my-form-id']); ?>

    <?= $form->field($model, 'ID_PEMESANAN')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'KAMAR_ID')->hiddenInput()->label(false) ?>


<?php
    $model->TANGGAL_MASUK = date('d-M-Y');
    $model->JUMLAH_HARI = 1;
    $model->TANGGAL_KELUAR = date('d-M-Y' , strtotime($model->TANGGAL_MASUK) + $model->JUMLAH_HARI * 60 * 60 * 24);
    $checkin = Html::getInputId($model, 'TANGGAL_MASUK');
    $malam = Html::getInputId($model, 'JUMLAH_HARI');
    $checkout = Html::getInputId($model, 'TANGGAL_KELUAR');
?>


    <div class="col-lg-4">
    <font size="2" color="#A9A9A9"><b>Check-In</b></font>
    <?= DatePicker::widget([
        'id' => 'checkin',
        'model' => $model,
        'attribute' => 'TANGGAL_MASUK',
        'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'd-M-yyyy',
                'startDate' => date('d-M-yyyy'),
                'prepend' => '<i class="icon-calendar"></i>',
            ]
    ]);?>
    </div>

    <?php $data = 
     ['1' => '1 Malam',
     '2' => '2 Malam',
     '3' => '3 Malam',
     '4' => '4 Malam',
     '5' => '5 Malam',
     '6' => '6 Malam',
     '7' => '7 Malam',
     '8' => '8 Malam',
     '9' => '9 Malam',
     '10' => '10 Malam',
     '11' => '11 Malam',
     '12' => '12 Malam',
     '13' => '13 Malam',
     '14' => '14 Malam',
     '15' => '15 Malam']; ?>
    <div class="col-lg-4">
    <?= $form->field($model, 'JUMLAH_HARI')->widget(Select2::classname(), [
            'id' => 'malam',
            'data' => $data,
            'language' => 'en',
            'options' => ['placeholder' => 'Hari'],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ]); ?>
    </div>

<?php
$js = <<<JS
$("#my-form-id #{$checkin}, #{$malam}").on("change", function (e) {
    var checkin = new Date($("#my-form-id #{$checkin}").val());
    var malam = parseInt($("#my-form-id #{$malam}").val());
    var date = checkin.setDate(checkin.getDate()+malam);
    var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"][checkin.getMonth()];
    $("#my-form-id #{$checkout}").val(checkin.getDate()+"-"+month+"-"+checkin.getFullYear())
});
JS;
$this->registerJs($js);
?>  

    <div class="col-lg-4">
    <?= $form->field($model, 'TANGGAL_KELUAR')->textInput(['readonly' => true]) ?>
    </div>

    <?php $data = 
     ['1' => '1 Kamar',
     '2' => '2 Kamar',
     '3' => '3 Kamar',
     '4' => '4 Kamar',
     '5' => '5 Kamar',
     '6' => '6 Kamar',
     '7' => '7 Kamar',
     '8' => '8 Kamar',
     '9' => '9 Kamar',
     '10' => '10 Kamar',
     '11' => '11 Kamar',
     '12' => '12 Kamar',
     '13' => '13 Kamar',
     '14' => '14 Kamar',
     '15' => '15 Kamar']; ?>
    <div class="col-lg-6">
    <?= $form->field($model, 'JUMLAH_KAMAR')->widget(Select2::classname(), [
            'data' => $data,
            'language' => 'en',
            'options' => ['placeholder' => 'Hari'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    </div>

    <div class="col-lg-6">
    <?= $form->field($model, 'NO_IDENTITAS')->textInput() ?>
    </div>

    <div class="col-lg-12">
    <?= $form->field($model, 'NAMA')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-12">
    <?= $form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6">
    <?= $form->field($model, 'NO_TELP')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6">
    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-lg-12">
        <center><?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-save"></span> Bayar Sekarang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary',
        'data' => [
                'confirm' => 'Apakah kamu yakin data yang dimasukkan sudah benar?',
                'method' => 'post',
            ],]) ?></center>
    </div>

    <?php ActiveForm::end(); ?>

</div>
