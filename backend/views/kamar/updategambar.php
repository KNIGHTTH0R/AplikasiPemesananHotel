<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hotel */

$this->title = 'Edit Gambar Kamar: ' . $model->NAMA_KAMAR;
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_KAMAR, 'url' => ['view', 'id' => $model->ID_KAMAR]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formgambar', [
        'model' => $model,
    ]) ?>

</div>
