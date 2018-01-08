<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ListView;

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
                'content' => '<b>'.Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->GAMBAR, ['width' => '80px']).'</b> <p><b>'.$model->NAMA_HOTEL.'</b></p>'
        ])
        );
// Add marker to the map
$map->addOverlay($marker);

$title = 'Orlando.com';
$this->title = Html::encode($title);

?>

<style type="text/css">
    .padding-peta {
        height: 550px;
    }
    .padding-luhur {
        padding-top: 30px;
    }
</style>

<h5><center><b>Data <?= Html::encode($model->NAMA_HOTEL) ?></b></center></h5>
<div class="col-lg-16">
<p><div class="thumbnail button-shadow col-lg-5">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Gambar',
                'value' => Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->GAMBAR, ['width' => '300px']),
                'format' => 'raw'
            ],
            [
                'label' => 'Nama Hotel',
                'value' => $model->NAMA_HOTEL,
            ],
            //'NAMA_HOTEL',
            'ALAMAT_HOTEL',
            'KETERANGAN:ntext',
            //[
            //    'label' => 'Nama Kamar',
            //    'value' => $model->kamar->NAMA_KAMAR,
            //],
        ],
    ]) ?>
<p><font size="3"><b>Fasilitas Hotel</b></font></p>
<?= ListView::widget([
    'dataProvider' => $dataProvider1,
    'class' => 'col-lg-6',
    'layout' => '{items}{pager}',
    'itemView' => '_fasilitas',
]) ?>
</div></p>
<div class="col-lg-1"></div>
<p><div class="thumbnail button-shadow col-lg-6 padding-peta">
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
    <p><center><h6><b>Lokasi Hotel</b></h6></center></p>
</div></p>
</div>

<div class="row">
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
      .button_maps {
            text-decoration: none;
            border: 1px solid #ccc;
            padding: 10px 15px;
            -moz-border-radius: 11px;
            -webkit-border-radius: 11px;
            border-radius: 11px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .button_maps:hover {
            background-color:       #1E90FF; /* Green */
            color: white;
        }
    </style>


    <!-- akhir dari Bagian js -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyARp1GaL-_8RdwUXyOdafKdrvyDW-TJER0" type="text/javascript"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script>

    var marker;
    var markers = [];
      function initialize() {

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php

        $conn= oci_connect("GILANG", "123456", "//localhost/xe");

        $stid = oci_parse($conn, 'SELECT HOTEL.ID_HOTEL, 
            HOTEL.NAMA_HOTEL, 
            HOTEL.GAMBAR, 
            HOTEL.LAT, 
            HOTEL.LNG, 
            HOTEL.WILAYAH_ID
            FROM HOTEL 
            WHERE HOTEL.WILAYAH_ID = '. $model->WILAYAH_ID.' AND HOTEL.ID_HOTEL != '. $model->ID_HOTEL.'');
        oci_execute($stid);

        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            $id_hotel = $row['ID_HOTEL'];
            $nama = $row['NAMA_HOTEL'];
            $kamar = $row['WILAYAH_ID'];
            $gambar = $row['GAMBAR'];
            $lat = $row['LAT'];
            $lng = $row['LNG'];

            echo ("addMarker($lat, $lng, '<b><img src=http://localhost/hotel/common/uploads/hotel/$gambar width=85 height=85></img></b> <p><b>$nama</b></p> <p><a href=index.php?r=catalog%2Fview&id=$id_hotel class=button_maps><b>Lihat Hotel</b></a></p>');\n");
        }

        oci_free_statement($stid);
        oci_close($conn);

        $conn2= oci_connect("GILANG", "123456", "//localhost/xe");

        $stid2 = oci_parse($conn2, 'SELECT HOTEL.ID_HOTEL, 
            HOTEL.NAMA_HOTEL, 
            HOTEL.GAMBAR, 
            HOTEL.LAT, 
            HOTEL.LNG, 
            HOTEL.WILAYAH_ID
            FROM HOTEL 
            WHERE HOTEL.WILAYAH_ID = '. $model->WILAYAH_ID.' AND HOTEL.ID_HOTEL = '. $model->ID_HOTEL.'');
        oci_execute($stid2);

        while (($row = oci_fetch_array($stid2, OCI_BOTH)) != false) {
            $id_hotel = $row['ID_HOTEL'];
            $nama = $row['NAMA_HOTEL'];
            $kamar = $row['WILAYAH_ID'];
            $gambar = $row['GAMBAR'];
            $lat = $row['LAT'];
            $lng = $row['LNG'];

            echo ("addMarker2($lat, $lng, '<b><img src=http://localhost/hotel/common/uploads/hotel/$gambar width=85 height=85></img></b> <p><b>$nama</b></p> <p><a href=index.php?r=catalog%2Fview&id=$id_hotel class=button_maps><b>Lihat Hotel</b></a></p>');\n");
        }

        oci_free_statement($stid2);
        oci_close($conn2);
     ?>
        // Proses membuat marker
        function addMarker(lat, lng, info) {
            var icon = 'http://localhost/hotel/common/uploads/marker/marker1.png';

            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            
            var marker = new google.maps.Marker({
                    map: map,
                    icon: icon,
                    position: lokasi
            });
            //markers.push(marker);
            
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
            //var markerCluster = new MarkerClusterer(map, markers,
            //{
            //    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }

            function addMarker2(lat, lng, info) {
            var icon = 'http://localhost/hotel/common/uploads/marker/marker2.png';

            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            
            var marker = new google.maps.Marker({
                    map: map,
                    icon: icon,
                    position: lokasi
            });
            //markers.push(marker);
            
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
            //var markerCluster = new MarkerClusterer(map, markers,
            //{
            //    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }
        }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

        function bindInfoWindow2(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body onload="initialize()">
    <div class="panel-body button-shadow col-lg-5">
<h5><center><b>Pilihan Hotel Di Wilayah Yang Sama</b></center></h5>
        <div id="map" style="width: 465px; height: 350px;"></div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
      .button_maps {
            text-decoration: none;
            border: 1px solid #ccc;
            padding: 10px 15px;
            -moz-border-radius: 11px;
            -webkit-border-radius: 11px;
            border-radius: 11px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .button_maps:hover {
            background-color:       #1E90FF; /* Green */
            color: white;
        }
    </style>


    <!-- akhir dari Bagian js -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyD-i9YAAQp9Riw_MHOfkvJCz09J_mdbbKk&callback=initialize" type="text/javascript"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script>

    var marker;
    var markers = [];
      function initialize() {

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        // Pembuatan petanya
        var map2 = new google.maps.Map(document.getElementById('map2'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php

        $con= oci_connect("GILANG", "123456", "//localhost/xe");

        $stid = oci_parse($con, 'SELECT KETERANGAN_LOKASI.NAMA_KETERANGAN, 
            KETERANGAN_LOKASI.LAT, 
            KETERANGAN_LOKASI.LNG,
            KETERANGAN_LOKASI.HOTEL_ID
            FROM KETERANGAN_LOKASI
            WHERE KETERANGAN_LOKASI.HOTEL_ID = '. $model->ID_HOTEL.'');
        oci_execute($stid);

        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            $id_hotel = $row['HOTEL_ID'];
            $nama = $row['NAMA_KETERANGAN'];
            $lat = $row['LAT'];
            $lng = $row['LNG'];

            echo ("addMarker($lat, $lng, '$nama');\n");
        }

        oci_free_statement($stid);
        oci_close($con);

        $con2= oci_connect("GILANG", "123456", "//localhost/xe");

        $stid2 = oci_parse($con2, 'SELECT HOTEL.NAMA_HOTEL, 
            HOTEL.LAT, 
            HOTEL.LNG,
            HOTEL.ID_HOTEL
            FROM HOTEL
            WHERE HOTEL.ID_HOTEL = '. $model->ID_HOTEL.'');
        oci_execute($stid2);

        while (($row = oci_fetch_array($stid2, OCI_BOTH)) != false) {
            $id_hotel = $row['ID_HOTEL'];
            $nama = $row['NAMA_HOTEL'];
            $lat = $row['LAT'];
            $lng = $row['LNG'];

            echo ("addMarker2($lat, $lng, '$nama');\n");
        }

        oci_free_statement($stid2);
        oci_close($con2);
     ?>
        // Proses membuat marker
        function addMarker(lat, lng, info) {
            var icon = 'http://localhost/hotel/common/uploads/marker/marker1.png';

            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            
            var marker = new google.maps.Marker({
                    map: map2,
                    icon: icon,
                    position: lokasi
            });
            //markers.push(marker);
            
            map2.fitBounds(bounds);
            bindInfoWindow(marker, map2, infoWindow, info);
            //var markerCluster = new MarkerClusterer(map, markers,
            //{
            //    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }

        function addMarker2(lat, lng, info) {
            var icon = 'http://localhost/hotel/common/uploads/marker/marker2.png';

            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            
            var marker = new google.maps.Marker({
                    map: map2,
                    icon: icon,
                    position: lokasi
            });
            //markers.push(marker);
            
            map2.fitBounds(bounds);
            bindInfoWindow(marker, map2, infoWindow, info);
            //var markerCluster = new MarkerClusterer(map, markers,
            //{
            //    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }
        }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow2(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body onload="initialize()">
    <div class="panel-body button-shadow col-lg-7">
    <h5><center><b>Tempat Menarik Terdekat</b></center></h5>
        <div class="col-lg-2" id="map2" style="width: 400px; height: 350px;"></div>
        
        <?= ListView::widget([
              'dataProvider' => $dataProvider2,
              'layout' => '{items}{pager}',
              'itemView' => '_keterangan',
        ]) ?>
    </div>
</body>
</html>
</div>

<p align="center"><font size="5"><b>Pilihan Kamar yang Tersedia</b></font></p>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'class' => 'col-lg-6',
    'layout' => '{items}{pager}',
    'itemView' => '_hotelview',
]) ?>
</p>
