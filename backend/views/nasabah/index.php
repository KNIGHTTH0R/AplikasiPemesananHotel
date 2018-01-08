<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NasabahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nasabah';
?>
<div class="nasabah-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //Html::a('Buat Nasabah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'NO_REKENING',
            'NO_KARTU',
            'TANGGAL_VALID',
            'NAMA',
            'CVV',
            [
                'label' => 'Bank',
                'attribute'=>'NAMA',
                'value'=>'bank.NAMA',
            ],
            [
                'format' => 'Currency',
                'attribute' => 'SALDO',
            ],
            'STATUS'
        ],
    ]); ?>
</div>
