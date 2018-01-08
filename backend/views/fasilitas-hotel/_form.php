<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Hotel;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\FasilitasHotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fasilitas-hotel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAMA_FASILITAS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HOTEL_ID')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Hotel::find()->all(),'ID_HOTEL','NAMA_HOTEL'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Hotel'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
