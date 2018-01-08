<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kredit */

$this->title = $model->NAMA_PEMILIK;
?>
<div class="kredit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_KREDIT',
            'KARTU_NO',
            'NAMA_PEMILIK',
            'TANGGAL_VALID',
            'CVV_NO',
            [
                'label' => 'Saldo',
                'value' => $model->NOMINAL,
                'format' => 'Currency',
            ],
            'KETERANGAN',
        ],
    ]) ?>

</div>
