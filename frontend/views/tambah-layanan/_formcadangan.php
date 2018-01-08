<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use common\models\Layanan;
use yii\helpers\ArrayHelper;
use unclead\widgets\MultipleInput;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(
'
$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});');
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

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'ID_TAMBAHLAYANAN')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'TANGGAL')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'TRANSAKSI_ID')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'NO_KAMAR')->textInput() ?>

    <div class="panel panel-default">
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $models[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'full_name',
                    'address_line1',
                    'address_line2',
                    'city',
                    'state',
                    'postal_code',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($models as $i => $modelss): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h4 class="panel-title pull-left">Layanan</h4>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelss->isNewRecord) {
                                echo Html::activeHiddenInput($modelss, "[{$i}]ID_TAMBAHLAYANAN");
                            }
                        ?>

                        <?= $form->field($model, '[{i}]LAYANAN_ID')->dropDownList(ArrayHelper::map(Layanan::find()->all(),'ID_LAYANAN','NAMA_LAYANAN'),['prompt'=>'Pilih Layanan'])?>

                        <?php echo $form->field($model, '[{i}]JUMLAH_LAYANAN')->dropDownList([
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
                    </div>
                <?php endforeach; ?>
                </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <?= $form->field($model, 'STATUS')->hiddenInput()->label(false) ?>

        <center><?= Html::submitButton($model->isNewRecord ? 'Bayar Sekarang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary',
        'data' => [
                'confirm' => 'Apakah kamu yakin ingin menambahkan layanan ini?',
                'method' => 'post',
            ],]) ?></center>

    <?php ActiveForm::end(); ?>

</div>
