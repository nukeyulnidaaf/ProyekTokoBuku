<?php
    @include("../utils/DB-Connection.php");
    @$sqlKomentar = "SELECT * FROM komentar WHERE id_informasi='".$_REQUEST['idInformasi']."'";
    @$resultKomentar = mysql_query($sqlKomentar);   
?>
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
                        <li><a href="jumlah-pengunjung.php">Jumlah Pengunjung</a></li>
                        <li class="active"><a href="komentar.php">Komentar</a></li>
                        <li><a href="konfigurasi.php">Konfigurasi</a></li>
                    </ul>
                    <div class="tab-content">
                        Komentar
                        <div class="container">
                            <form action="komentar.php" method="post">
                                <div class="form-group">
                                    <label class="control-label">Toko Buku</label>
                                    <select class="form-control" name="idInformasi">
                                    <option value="">-- Pilih Toko Buku --</option>
                                    <?php
                                        $sql = "SELECT id_informasi, nama_toko FROM informasi";
                                        $result = mysql_query($sql) or die(mysql_error());
                                        while($row = mysql_fetch_array($result)){
                                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                        }
                                    ?>
                                </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Lihat Komentar">
                                    <a href="komentar/tulis-komentar.php"><button type="button" class="btn btn-primary">Tulis Komentar</button></a>
                                </div>
                            </form>
                            <div class="container">
                                <?php
                                    while($rowKomentar = mysql_fetch_array($resultKomentar)){
                                    echo "<label class='control-class'>".$rowKomentar[2]."</label>";
                                    echo "<div class='well well-sm'>";
                                    echo "<div class='container-fluid'>";
                                    echo "<div class='col-md-6'>".$rowKomentar[4]."</div>";
                                    echo "<div class='col-md-12'>";
                                    echo "<p class='text-justify'>".$rowKomentar[1]."</p>";
                                    echo "</div>";
                                    echo "<div class='col-md-12'>";
                                    echo "<a href='komentar/php/delete-komentar.php?idKomentar=".$rowKomentar[0]."'><button type='button' class='btn btn-primary btn-sm'>Hapus Komentar</button></a>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="../assets/jQuery-1.11.2/jquery-1.11.2.js"></script>
<script type="text/javascript" src="../assets/Bootstrap-3.3.1/js/bootstrap.js"></script>