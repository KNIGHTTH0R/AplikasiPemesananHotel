<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Layanan */

$this->title = 'Edit Layanan: ' . $model->NAMA_LAYANAN;
$this->params['breadcrumbs'][] = ['label' => 'Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_LAYANAN, 'url' => ['view', 'id' => $model->ID_LAYANAN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="layanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
