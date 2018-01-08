<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KreditLayanan */

$this->title = $model->ID_KREDIT;
$this->params['breadcrumbs'][] = ['label' => 'Kredit Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kredit-layanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_KREDIT',
            'KARTU_NO',
            'NAMA_PEMILIK',
            'TANGGAL_VALID',
            'CVV_NO',
            'NOMINAL',
            'KETERANGAN',
        ],
    ]) ?>

</div>
