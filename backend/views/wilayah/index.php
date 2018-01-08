<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WilayahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wilayah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wilayah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Wilayah', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cetak Laporan', ['cetakwilayah'], ['class' => 'btn btn-default','target' => '_blank']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID_WILAYAH',
            'NAMA_WILAYAH',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
