<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FasilitasHotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fasilitas Hotel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Fasilitas Hotel', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cetak Laporan', ['cetakfasilitashotel'], ['class' => 'btn btn-default','target' => '_blank']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID_FASILITAS',
            'NAMA_FASILITAS',
            'HOTEL_ID',
            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Gambar',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@imageurl') . "/fasilitas/" . $data['GAMBAR'],
                        ['width' => '50px']);
                    },
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{images} {view} {update} {delete}',
                'buttons' => [
                    'images' => function ($url, $model, $key) {
                         return Html::a('<span class="glyphicon glyphicon glyphicon-picture" aria-label="Image"></span>', Url::to(['fasilitas-hotel/updategambar', 'id' => $model->ID_FASILITAS]));
                    }
                ],
            ],
        ],
    ]); ?>
</div>
