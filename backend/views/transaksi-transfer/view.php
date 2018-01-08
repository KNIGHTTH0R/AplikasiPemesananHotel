<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */

$this->title = $model->REKENING_NO;
?>
<div class="transaksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TRANSAKSI',
            'REKENING_NO',
            'TANGGAL',
            'KETERANGAN',
        ],
    ]) ?>

</div>
