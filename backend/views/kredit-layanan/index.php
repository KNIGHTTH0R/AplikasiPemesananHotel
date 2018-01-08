<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KreditLayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kredit Layanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kredit-layanan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            'ID_KREDIT',
            'KARTU_NO',
            'NAMA_PEMILIK',
            'TANGGAL_VALID',
            'CVV_NO',
            // 'NOMINAL',
            // 'KETERANGAN',

        ],
    ]); ?>
</div>
