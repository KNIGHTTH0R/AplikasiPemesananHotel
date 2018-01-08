<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KreditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran via ATM';
?>
<div class="kredit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'ID_TRANSFER',
            'REKENING_NO',
            'REKENING_TUJUAN',
            [
                'format' => 'Currency',
                'attribute' => 'NOMINAL',
            ],
            'KETERANGAN',
        ],
    ]); ?>
</div>
