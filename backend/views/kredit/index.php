<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KreditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran via Kredit';
?>
<div class="kredit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'ID_KREDIT',
            'KARTU_NO',
            'NAMA_PEMILIK',
            'TANGGAL_VALID',
            'CVV_NO',
            [
                'format' => 'Currency',
                'attribute' => 'NOMINAL',
            ],
            'KETERANGAN',
        ],
    ]); ?>
</div>
