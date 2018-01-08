<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Hotel', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cetak Laporan', ['cetakhotel'], ['class' => 'btn btn-default','target' => '_blank']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Gambar',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@imageurl') . "/hotel/" . $data['GAMBAR'],
                        ['width' => '200px']);
                    },
            ],
            'ID_HOTEL',
            'NAMA_HOTEL',
            'ALAMAT_HOTEL',
            [
                'label' => 'Wilayah',
                'attribute'=>'NAMA_WILAYAH',
                'value'=>'wilayah.NAMA_WILAYAH',
            ],
            // 'LAT',
            // 'LNG',
            'KETERANGAN',
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{images} {view} {update} {delete}',
                'buttons' => [
                    'images' => function ($url, $model, $key) {
                         return Html::a('<span class="glyphicon glyphicon glyphicon-picture" aria-label="Image"></span>', Url::to(['hotel/updategambar', 'id' => $model->ID_HOTEL]));
                    }
                ],
            ],
        ],
    ]); ?>
</div>
