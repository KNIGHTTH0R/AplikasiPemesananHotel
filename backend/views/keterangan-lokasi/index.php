<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KeteranganLokasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keterangan Lokasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keterangan-lokasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Keterangan Lokasi', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cetak Laporan', ['cetakketerangan'], ['class' => 'btn btn-default','target' => '_blank']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID_KETERANGAN',
            'NAMA_KETERANGAN',
            'HOTEL_ID',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
