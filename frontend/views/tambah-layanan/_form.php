<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use common\models\Layanan;
use yii\helpers\ArrayHelper;

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

<div class="pemesanan-form">

    <?php $form = ActiveForm::begin(['id' => 'my-form-id']); ?>

    <?= $form->field($model, 'ID_TAMBAHLAYANAN')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'TANGGAL')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'TRANSAKSI_ID')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'NO_KAMAR')->hiddenInput()->label(false) ?>

    <div class="col-lg-6">
    <?= $form->field($model, 'NAMA_LAYANAN[]')->dropDownList(ArrayHelper::map(Layanan::find()->all(),'NAMA_LAYANAN','NAMA_LAYANAN'),['multiple'=>'multiple'])?>
    </div>

    <div class="col-lg-6">
    <?php echo $form->field($model, 'JUMLAH_LAYANAN')->dropDownList([
                         '1' => '1 Layanan',
                         '2' => '2 Layanan',
                         '3' => '3 Layanan',
                         '4' => '4 Layanan',
                         '5' => '5 Layanan',
                         '6' => '6 Layanan',
                         '7' => '7 Layanan',
                         '8' => '8 Layanan',
                         '9' => '9 Layanan',
                         '10' => '10 Layanan',
                         '11' => '11 Layanan',
                         '12' => '12 Layanan',
                         '13' => '13 Layanan',
                         '14' => '14 Layanan',
                         '15' => '15 Layanan'
    ]); ?>
    </div>

    <?= $form->field($model, 'STATUS')->hiddenInput()->label(false) ?>

    <?php
        $model->HARGA = 20000;
        $layanan = Html::getInputId($model, 'NAMA_LAYANAN');
        $jumlah = Html::getInputId($model, 'JUMLAH_LAYANAN');
        $total = Html::getInputId($model, 'HARGA');
    ?>

<?php
$js = <<<JS
$("#my-form-id  #{$jumlah}, #{$total}, #{$layanan}").on("change", function (e) {
    var layanan = parseInt($("#my-form-id #{$layanan} :selected").length);
    var jumlah = parseInt($("#my-form-id #{$jumlah}").val());
    var total = parseInt($("#my-form-id #{$total}").val());
    $("#my-form-id #{$total}").val(total*jumlah*layanan);
});
JS;
$this->registerJs($js);
?>  
<?= $form->field($model, 'HARGA')->hiddenInput()->label(false) ?>
    <div class="col-lg-6">
    
    

        <center><?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-save"></span> Bayar Sekarang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary',
        'data' => [
                'confirm' => 'Apakah kamu yakin ingin menambahkan layanan ini?',
                'method' => 'post',
            ],]) ?></center>

    </div>

    <?php ActiveForm::end(); ?>

</div>
