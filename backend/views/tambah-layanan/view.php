<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TambahLayanan */

$this->title = $model->TRANSAKSI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Tambah Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tambah-layanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TAMBAHLAYANAN',
            'TANGGAL',
            'TRANSAKSI_ID',
            'NAMA_LAYANAN',
            'JUMLAH_LAYANAN',
            'STATUS',
        ],
    ]) ?>

</div>
