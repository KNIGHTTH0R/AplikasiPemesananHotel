<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransferLayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transfer Layanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-layanan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            'ID_TRANSFER',
            'REKENING_NO',
            'REKENING_TUJUAN',
            'NOMINAL',
            'KETERANGAN',

        ],
    ]); ?>
</div>
