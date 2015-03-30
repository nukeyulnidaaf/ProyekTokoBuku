<?php
    include('../../utils/DB-Connection.php');
    $sql = "SELECT * FROM informasi WHERE id_informasi='".$_REQUEST['idInformasi']."'";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
?>
<html>
    <head>
        <title>SI-ETB</title>
        <link rel="stylesheet" type="text/css" href="../../assets/Bootstrap-3.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../assets/Custom-Configuration/css/custom.css">
        <link rel="stylesheet" type="text/css" href="../../assets/Font-Awesome-master/css/font-awesome.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="pull-right">
                Logout
            </div>
            <div class="col-md-12">    
                <center><h3>Sistem Informasi Etalase Toko Buku</h3></center>
                <div class="tabbable tabs-left col-md-1">
                    <ul class="nav nav-tabs">
                        <li><a href="#">Beranda</a></li>
                        <li class="active"><a href="#">Daftar Toko</a></li>
                        <li><a href="#">Jumlah Pengunjung</a></li>
                        <li><a href="#">Komentar</a></li>
                        <li><a href="#">Konfigurasi</a></li>
                    </ul>
                </div>
                <div class="tab-content col-md-11">
                    <strong>Form Edit Informasi Toko Buku</strong>
                    <a href="../daftar-toko.php"><button type="button" class="btn btn-primary pull-right">Kembali</button></a>
                    <form action="php/edit-data-toko-buku.php?idInformasi=<?php echo $row[0]; ?>" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nama Toko Buku</label>
                                        <input type="text" class="form-control" name="namaTokoBuku" id="namaTokoBuku" placeholder="Nama Toko Buku" value="<?php echo $row[3]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamatTokoBuku" id="alamatTokoBuku" placeholder="Alamat Toko" value="<?php echo $row[1]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nomer Telphone</label>
                                        <input type="text" class="form-control" name="nomerTelphoneTokoBuku" id="nomerTelphoneTokoBuku" placeholder="Nomer Telphone" value="<?php echo $row[4]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Jam Operasional</label>
                                        <input type="text" class="form-control" name="jamOperasionalTokoBuku" id="jamOperasionalTokoBuku" placeholder="Jam Operasional" value="<?php echo $row[5]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Lokasi Toko</label>
                                        <select class="form-control" name="lokasiTokoBuku">
                                            <?php
                                                include("../../utils/DB-Connection.php");
                                                $sql1 = "SELECT * FROM pencarian WHERE id_wilayah IN (SELECT id_wilayah FROM informasi WHERE id_informasi = '".$row[0]."');";
                                                $result1 = mysql_query($sql1) or die(mysql_error());
                                                while($row1 = mysql_fetch_array($result1))
                                                echo "<option values='".$row1[0]."'>".$row1[1]."</option>";

                                                $sql2 = "SELECT * FROM pencarian WHERE id_wilayah NOT IN (SELECT id_wilayah FROM informasi WHERE id_informasi = '".$row[0]."');";
                                                $result2 = mysql_query($sql2) or die(mysql_error());
                                                while($row2 = mysql_fetch_array($result2))
                                                echo "<option values='".$row2[0]."'>".$row2[1]."</option>";
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gambar Toko</label>
                                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <div class="col-md-12">
                                        <strong>Foto Sebelumnya</strong>
                                        <div class="container-fluid">
                                            <img src="../../images/<?php echo $row[2];?>" width='100%'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <strong>Google Maps Coordinate</strong>
                                <div id="map-canvas"></div>
                                <div class="form-group">
                                    <label class="control-label">Lat : </label>
                                    <input type="text" class="form-control" name="lat" value="<?php echo $row[7]; ?>">
                                    <label class="control-label">Lang : </label>
                                    <input type="text" class="form-control" name="lang" value="<?php echo $row[6]; ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default col-md-12" value="<?php $row[0];?>" name="submitData">Update Informasi</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="../../assets/jQuery-1.11.2/jquery-1.11.2.js"></script>
<script type="text/javascript" src="../../assets/Bootstrap-3.3.1/js/bootstrap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<script>

    var $lat;
    var $lang;

    $.ajax({
        url:'php/get-lat.php',
        method: 'get',
        async: false,
        data:{
            namaTokoBuku:$('#namaTokoBuku').val(),
            nomerTelphoneTokoBuku: $('#nomerTelphoneTokoBuku').val()
        },
        success:function(response){
            $lat=Number(response);
        }
    });

    $.ajax({
        url:'php/get-lang.php',
        method: 'get',
        async: false,
        data:{
            namaTokoBuku:$('#namaTokoBuku').val(),
            nomerTelphoneTokoBuku: $('#nomerTelphoneTokoBuku').val()
        },
        success:function(response){
            $lang=Number(response);
        }
    });

    function initialize() {
      var mapOptions = {
        zoom: 15,
        center: new google.maps.LatLng($lang, $lat)
      };

      var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

      var infowindow = new google.maps.InfoWindow();

      var marker = new google.maps.Marker({
        map: map,
        // Define the place with a location, and a query string.
        place: {
          location: new google.maps.LatLng($lang, $lat),
          query: 'Google, Surabaya, Indonesian'

        },
        // Attributions help users find your site again.
        attribution: {
          source: 'Google Maps JavaScript API',
          webUrl: 'https://developers.google.com/maps/'
        }
      });

      // Construct a new InfoWindow.
      var infowindow = new google.maps.InfoWindow({
        content: 'Grammedia Expo | Jl. Basuki Rahmat'
      });

      // Opens the InfoWindow when marker is clicked.
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
