<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PembatalanLayanan */

$this->title = 'Edit Pembatalan Layanan: ' . $model->ID_PEMBATALAN;
$this->params['breadcrumbs'][] = ['label' => 'Pembatalan Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PEMBATALAN, 'url' => ['view', 'id' => $model->ID_PEMBATALAN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembatalan-layanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
