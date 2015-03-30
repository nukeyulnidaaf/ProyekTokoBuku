<html>
    <head>
        <title>SI-ETB</title>
        <link rel="stylesheet" type="text/css" href="../../assets/Bootstrap-3.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../assets/Custom-Configuration/css/custom.css">
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
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Daftar Toko</a></li>
                        <li><a href="#">Jumlah Pengunjung</a></li>
                        <li class="active"><a href="#">Komentar</a></li>
                        <li><a href="#">Konfigurasi</a></li>
                    </ul>
                    <div class="tab-content">
                        <strong>Komentar</strong>
                        <a href="../komentar.php"><button type="button" class="btn btn-primary pull-right">Kembali</button></a>
                        <div class="container">
                            <form action="php/simpan-komentar.php" method="POST">
                                <div class="form-group">
                                    <label class="control-label">Toko Buku</label>
                                    <select class="form-control" name="idInformasi">
                                        <option value="">-- Pilih Toko Buku --</option>
                                        <?php
                                            include("../../utils/DB-Connection.php");
                                            $sql = "SELECT id_informasi, nama_toko FROM informasi";
                                            $result = mysql_query($sql) or die(mysql_error());
                                            while($row = mysql_fetch_array($result)){
                                                echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tuliskan Komentar</label>
                                    <textarea class="form-control" name="isiKomentar"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit Komentar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="../../assets/jQuery-1.11.2/jquery-1.11.2.js"></script>
<script type="text/javascript" src="../../assets/Bootstrap-3.3.1/js/bootstrap.js"></script>