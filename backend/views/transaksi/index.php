<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransaksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Kredit';
?>
<div class="transaksi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            'ID_TRANSAKSI',
            'KARTU_NO',
            'TANGGAL',
            'KETERANGAN',

        ],
    ]); ?>
</div>
