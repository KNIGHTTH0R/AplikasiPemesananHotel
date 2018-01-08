<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PembatalanPemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembatalan Pemesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembatalan-pemesanan-index">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'ID_PEMBATALAN',
            'PEMESANAN_ID',
            'NO_IDENTITAS',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
