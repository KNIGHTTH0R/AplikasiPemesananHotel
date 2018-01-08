<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hotel */

$this->title = 'Edit Gambar Fasilitas: ' . $model->NAMA_FASILITAS;
$this->params['breadcrumbs'][] = ['label' => 'Fasilitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_FASILITAS, 'url' => ['view', 'id' => $model->ID_FASILITAS]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formgambar', [
        'model' => $model,
    ]) ?>

</div>
