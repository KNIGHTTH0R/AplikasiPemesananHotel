<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//google maps
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;

$coord = new LatLng(['lat' => $model->LAT, 'lng' => $model->LNG]);
$map = new Map([
        'center' => $coord,
        'zoom' => 14,
]);
// Lets add a marker now
$marker = new Marker([
        'position' => $coord,
        'title' => $model->ID_HOTEL,
]);
// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
        new InfoWindow([
                'content' => $model->NAMA_HOTEL
        ])
        );
// Add marker to the map
$map->addOverlay($marker);

/* @var $this yii\web\View */
/* @var $model common\models\Hotel */

$this->title = $model->NAMA_HOTEL;
$this->params['breadcrumbs'][] = ['label' => 'Hotel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->ID_HOTEL], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Edit Gambar', ['updategambar', 'id' => $model->ID_HOTEL], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->ID_HOTEL], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="col-lg-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Gambar',
                'value' => Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->GAMBAR, ['width' => '300px']),
                'format' => 'raw'
            ],
            'ID_HOTEL',
            'NAMA_HOTEL',
            'ALAMAT_HOTEL',
            [
                'label' => 'Wilayah',
                'value' => $model->wilayah->NAMA_WILAYAH,
            ],
            'LAT',
            'LNG',
            'KETERANGAN',
        ],
    ]) ?>
</div>
<div class="col-lg-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'Peta',
                'value'=>$model->LAT==''?'':$map->display(),
                'format' => 'raw',
            ],
        ],
    ]) ?>
</div>

</div>
