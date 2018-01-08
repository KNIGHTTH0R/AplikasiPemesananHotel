<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KeteranganLokasi */

$this->title = 'Buat Keterangan Lokasi';
$this->params['breadcrumbs'][] = ['label' => 'Keterangan Lokasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keterangan-lokasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
