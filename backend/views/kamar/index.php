<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kamar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kamar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Kamar', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cetak Laporan', ['cetakkamar'], ['class' => 'btn btn-default','target' => '_blank']) ?>
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
                    return Html::img(Yii::getAlias('@imageurl') . "/kamar/" . $data['GAMBAR'],
                        ['width' => '200px']);
                    },
            ],
            'ID_KAMAR',
            'NAMA_KAMAR',
            'HOTEL_ID',
            'TIPE_KAMAR',
            'HARGA',
            'STOK_KAMAR',
            'FASILITAS',
            'KETERANGAN',
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{images} {view} {update} {delete}',
                'buttons' => [
                    'images' => function ($url, $model, $key) {
                         return Html::a('<span class="glyphicon glyphicon glyphicon-picture" aria-label="Image"></span>', Url::to(['kamar/updategambar', 'id' => $model->ID_KAMAR]));
                    }
                ],
            ],
        ],
    ]); ?>
</div>
