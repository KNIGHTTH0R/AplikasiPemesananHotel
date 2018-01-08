<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Kamar;
use common\models\Wilayah;
use common\models\KeteranganLokasi;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Hotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAMA_HOTEL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT_HOTEL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WILAYAH_ID')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Wilayah::find()->all(),'ID_WILAYAH','NAMA_WILAYAH'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Wilayah'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= \ibrarturi\latlngfinder\LatLngFinder::widget([
        'model' => $model,              // model object
        'latAttribute' => 'lat',        // Latitude attribute
        'lngAttribute' => 'lng',        // Longitude attribute
        'defaultLat' => -6.914744,        // Default latitude for the map
        'defaultLng' => 107.609810,         // Default Longitude for the map
        'defaultZoom' => 8,             // Default zoom for the map
        'enableZoomField' => false,      // True: for assigning zoom values to the zoom field, False: Do not assign zoom value to the zoom field
    ]); ?>

    <?= $form->field($model, 'LAT')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'LNG')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'KETERANGAN')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
