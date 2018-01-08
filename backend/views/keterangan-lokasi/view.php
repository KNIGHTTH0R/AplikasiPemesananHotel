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
        'title' => $model->ID_KETERANGAN,
]);
// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
        new InfoWindow([
                'content' => $model->NAMA_KETERANGAN
        ])
        );
// Add marker to the map
$map->addOverlay($marker);

/* @var $this yii\web\View */
/* @var $model common\models\KeteranganLokasi */

$this->title = $model->NAMA_KETERANGAN;
$this->params['breadcrumbs'][] = ['label' => 'Keterangan Lokasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keterangan-lokasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->ID_KETERANGAN], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->ID_KETERANGAN], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="col-lg-7">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [            [
                'attribute'=>'Peta',
                'value'=>$model->LAT==''?'':$map->display(),
                'format' => 'raw',
            ],
        ],
    ]) ?>
</div>
<div class="col-lg-5">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_KETERANGAN',
            'NAMA_KETERANGAN',
            'HOTEL_ID',
        ],
    ]) ?>
</div>

</div>
