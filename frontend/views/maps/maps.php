<?php

/* @var $this yii\web\View */

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;

// edofre objects instead of dosamigos
use edofre\markerclusterer\Map;
use edofre\markerclusterer\Marker;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Maps Clusterer';
?>
<div class="maps-index" width="1070px">
    <?php
    $map = new Map([
        'center' => new LatLng(['lat' => 52.1326, 'lng' => 5.2913]), // Center of Netherlands
        'zoom'   => 7,
    ]);

    $cities = [
        Html::encode($model['nama_hotel']) => new LatLng(['lat' => Html::encode($model['lat']), 'lng' => Html::encode($model['lng'])]),
    ];

    foreach ($cities as $city => $lat_lng) {
        $marker = new Marker([
            'position'  => $lat_lng,
            'title'     => $city,
            'clickable' => true,
        ]);

        $marker->attachInfoWindow(new InfoWindow(['content' => "<strong>{$city}</strong>"]));
        $map->addOverlay($marker);
    }

    $map->center = $map->getMarkersCenterCoordinates();
    $map->zoom = $map->getMarkersFittingZoom() - 1;
    ?>

    <div class="row">
        <div class="col-sm-12">
            <?= $map->display(); ?>
        </div>
    </div>
</div>