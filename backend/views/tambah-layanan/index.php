<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TambahLayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tambah Layanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tambah-layanan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    <?= Html::a('Cetak Laporan', ['cetaktambahlayanan'], ['class' => 'btn btn-default','target' => '_blank']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID_TAMBAHLAYANAN',
            'TANGGAL',
            'TRANSAKSI_ID',
            'NAMA_LAYANAN',
            'JUMLAH_LAYANAN',
            // 'STATUS',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
