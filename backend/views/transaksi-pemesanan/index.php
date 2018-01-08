<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransaksiPemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cari Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-pemesanan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID_TRANSAKSI_PESAN',
            'PEMESANAN_ID',
            'TANGGAL',
            'KETERANGAN',
            'NO_KAMAR',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>
