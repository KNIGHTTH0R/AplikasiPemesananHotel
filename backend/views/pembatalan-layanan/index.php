<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PembatalanLayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembatalan Layanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembatalan-layanan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID_PEMBATALAN',
            'TAMBAHLAYANAN_ID',
            'NO_KAMAR',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
