<?php
$conn= oci_connect("GILANG", "123456", "//localhost/xe");
use yii\helpers\Html;
$this->title = 'Orlando.com';
?>
<h4><center>Lokasi - Lokasi Hotel Yang Tersedia</center></h4>
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
        $stid = oci_parse($conn, 'SELECT HOTEL.ID_HOTEL, 
            HOTEL.NAMA_HOTEL,
            HOTEL.GAMBAR, 
            HOTEL.LAT, 
            HOTEL.LNG
            FROM HOTEL');
        oci_execute($stid);

        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            $id_hotel = $row['ID_HOTEL'];
            $nama = $row['NAMA_HOTEL'];
            $gambar = $row['GAMBAR'];
            $lat = $row['LAT'];
            $lng = $row['LNG'];

            echo ("addMarker($lat, $lng, '<b>".Html::img(Yii::getAlias('@imageurl')."/hotel/$gambar", ['width' => '80px','height' => '80px'])."</b> <p><b>$nama</b></p> <p><a href=index.php?r=catalog%2Fview&id=$id_hotel class=button_maps><b>Lihat Hotel</b></a></p>');\n");
        }

        oci_free_statement($stid);
        oci_close($conn);
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
            markers.push(marker);
            
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
            
        }
        var markerCluster = new MarkerClusterer(map, markers,
                {
                    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
                });
            }
        markerCluster.addMarker(lat, lng, info);

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body onload="initialize()">
    <div class="panel-body button-shadow">
        <div id="map" style="width: 1150px; height: 480px;"></div>
    </div>
</body>
</html>