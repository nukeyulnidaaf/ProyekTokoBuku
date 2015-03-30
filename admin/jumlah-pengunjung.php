<html>
    <head>
        <title>SI-ETB</title>
        <link rel="stylesheet" type="text/css" href="../assets/Bootstrap-3.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../assets/Custom-Configuration/css/custom.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="pull-right">
                Logout
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12">    
                <center><h3>Sistem Informasi Etalase Toko Buku</h3></center>
                <!-- tabs left -->
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs">
                        <li><a href="beranda.php">Beranda</a></li>
                        <li><a href="daftar-toko.php">Daftar Toko</a></li>
                        <li class="active"><a href="jumlah-pengunjung.php">Jumlah Pengunjung</a></li>
                        <li><a href="komentar.php">Komentar</a></li>
                        <li><a href="konfigurasi.php">Konfigurasi</a></li>
                    </ul>
                    <div class="tab-content container">
                        <center><strong>Jumlah Pengunjung</strong></center>
                        <form>
                            <div class="form-group">
                                <label class="control-label">Tahun</label>
                                <select class="form-control" name="tahun" id="tahun">
                                    <?php
                                        include("../utils/DB-Connection.php");
                                        $sql = "SELECT tahun_jumlah_pengunjung FROM jumlah_pengunjung GROUP BY tahun_jumlah_pengunjung";
                                        $result = mysql_query($sql) or die(mysql_error());
                                        while($row = mysql_fetch_array($result)){
                                            echo "<option value='".$row[0]."'>".$row[0]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div id="render-container">
                                <!-- Grafik Goes Here -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="../assets/jQuery-1.11.2/jquery-1.11.2.js"></script>
<script type="text/javascript" src="../assets/Bootstrap-3.3.1/js/bootstrap.js"></script>
<script type="text/javascript" src="../assets/Highcharts-4.1.4/js/highcharts.js"></script>
<script type="text/javascript" src="jumlah-pengunjung/js/jumlah-pengunjung.js"></script>