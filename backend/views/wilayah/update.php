<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Wilayah */

$this->title = 'Edit Wilayah: ' . $model->NAMA_WILAYAH;
$this->params['breadcrumbs'][] = ['label' => 'Wilayah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_WILAYAH, 'url' => ['view', 'id' => $model->ID_WILAYAH]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="wilayah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
