<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FasilitasHotel */

$this->title = 'Edit Fasilitas Hotel: ' . $model->NAMA_FASILITAS;
$this->params['breadcrumbs'][] = ['label' => 'Fasilitas Hotel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_FASILITAS, 'url' => ['view', 'id' => $model->ID_FASILITAS]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fasilitas-hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
