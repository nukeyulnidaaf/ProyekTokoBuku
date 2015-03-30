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
                    <strong>Form Tambah Buku</strong>
                    <a href="../daftar-toko.php"><button type="button" class="btn btn-primary pull-right">Kembali</button></a>
                    <form action="php/simpan-data-toko-baru.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nama Toko Buku</label>
                                        <input type="text" class="form-control" name="namaTokoBuku" id="namaTokoBuku" placeholder="Nama Toko Buku">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamatTokoBuku" id="alamatTokoBuku" placeholder="Alamat Toko"
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nomer Telphone</label>
                                        <input type="text" class="form-control" name="nomerTelphoneTokoBuku" id="nomerTelphoneTokoBuku" placeholder="Nomer Telphone">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Jam Operasional</label>
                                        <input type="text" class="form-control" name="jamOperasionalTokoBuku" id="jamOperasionalTokoBuku" placeholder="Jam Operasional">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Lokasi Toko</label>
                                        <select class="form-control" name="lokasiTokoBuku" id="lokasiTokoBuku">
                                            <?php
                                                include("../../utils/DB-Connection.php");
                                                $sql = "SELECT * FROM pencarian";
                                                $result = mysql_query($sql) or die(mysql_error());
                                                while($row = mysql_fetch_array($result)){
                                                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gambar Toko</label>
                                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <strong>Google Maps Coordinate</strong>
                                <iframe width="450" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Surabaya%2C%20East%20Java%2C%20Republic%20of%20Indonesia&key=AIzaSyDJM7pgswq7cFpRFq2wTllQkCpNdFnuOGI"></iframe>
                                <div class="form-group">
                                    <label class="control-label">Lat : </label>
                                    <input type="text" class="form-control" name="lat">
                                    <label class="control-label">Lang : </label>
                                    <input type="text" class="form-control" name="lang">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default col-md-12">Submit Informasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="../../assets/jQuery-1.11.2/jquery-1.11.2.js"></script>
<script type="text/javascript" src="../../assets/Bootstrap-3.3.1/js/bootstrap.js"></script>