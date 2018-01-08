<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransaksiPembatalanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Pembatalan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-pembatalan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_TRANSAKSI_BATAL',
            'PEMESANAN_ID',
            'NO_IDENTITAS',
            'TANGGAL_BATAL',
            [
                'label' => 'Pengembalian Uang',
                'attribute'=>'HARGA',
                'value'=>function ($model) {
                if($model)
                    return Yii::$app->formatter->asCurrency(($model->pemesanan->kamar->HARGA  * $model->pemesanan->JUMLAH_HARI * $model->pemesanan->JUMLAH_KAMAR)-(($model->pemesanan->kamar->HARGA  * $model->pemesanan->JUMLAH_HARI * $model->pemesanan->JUMLAH_KAMAR)*60/100));
                else
                    return 0;
                }
            ],
            [
                'label' => 'Tambahan Perusahaan',
                'attribute'=>'HARGA',
                'value'=>function ($model) {
                if($model)
                    return Yii::$app->formatter->asCurrency(($model->pemesanan->kamar->HARGA  * $model->pemesanan->JUMLAH_HARI * $model->pemesanan->JUMLAH_KAMAR)*60/100);
                else
                    return 0;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
