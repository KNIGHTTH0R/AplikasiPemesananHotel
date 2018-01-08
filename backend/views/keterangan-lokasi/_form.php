<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Hotel;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\KeteranganLokasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keterangan-lokasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAMA_KETERANGAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HOTEL_ID')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Hotel::find()->all(),'ID_HOTEL','NAMA_HOTEL'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Hotel'],
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
        'defaultZoom' => 7,             // Default zoom for the map
        'enableZoomField' => false,      // True: for assigning zoom values to the zoom field, False: Do not assign zoom value to the zoom field
    ]); ?>

    <?= $form->field($model, 'LAT')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'LNG')->textInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
