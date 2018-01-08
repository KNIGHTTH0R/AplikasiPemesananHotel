<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Hotel;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kamar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = 
     ['Standart Room' => 'Standart Room',
     'Deluxe Room' => 'Deluxe Room',
     'Premiere Room' => 'Premiere Room',]; ?>
    <?= $form->field($model, 'NAMA_KAMAR')->widget(Select2::classname(), [
            'id' => 'malam',
            'data' => $data,
            'language' => 'en',
            'options' => ['placeholder' => 'Hari'],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ]); ?>

    <?= $form->field($model, 'TIPE_KAMAR')->dropDownList(['Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large']) ?>

    <?= $form->field($model, 'HOTEL_ID')->dropDownList(ArrayHelper::map(Hotel::find()->all(), 'ID_HOTEL', 'NAMA_HOTEL'), ['prompt' => 'Select Hotel'])->label('Hotel') ?>

    <?= $form->field($model, 'HARGA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STOK_KAMAR')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'FASILITAS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KETERANGAN')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
