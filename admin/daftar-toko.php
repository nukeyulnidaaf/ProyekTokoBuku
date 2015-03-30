<html>
    <head>
        <title>SI-ETB</title>
        <link rel="stylesheet" type="text/css" href="../assets/Bootstrap-3.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../assets/Custom-Configuration/css/custom.css">
        <link rel="stylesheet" type="text/css" href="../assets/Font-Awesome-master/css/font-awesome.css">
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
                        <li><a href="beranda.php">Beranda</a></li>
                        <li class="active"><a href="daftar-toko.php">Daftar Toko</a></li>
                        <li><a href="jumlah-pengunjung.php">Jumlah Pengunjung</a></li>
                        <li><a href="komentar.php">Komentar</a></li>
                        <li><a href="konfigurasi.php">Konfigurasi</a></li>
                    </ul>
                </div>
                <div class="tab-content col-md-11">
                    <a href="daftar-toko/buat-baru.php"><button type="button" class="btn btn-default"><i class="fa fa-paper-plane"></i> Buat Baru</button></a>
                    <div class="divider">&nbsp;</div>
                    <table class="table">
                        <tr>
                            <td>Nama Toko Buku</td>
                            <td>Alamat</td>
                            <td>Nomer Telphone</td>
                            <td>Jam Operasional</td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php
                            include('../utils/DB-Connection.php');
                            $sql = "SELECT * FROM informasi";
                            $result = mysql_query($sql) or die(mysql_error());
                            while($row = mysql_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>".$row[3]."</td>";
                                echo "<td>".$row[1]."</td>";
                                echo "<td>".$row[4]."</td>";
                                echo "<td>".$row[5]."</td>";
                                echo "<td><a href='daftar-toko/edit-data-toko-buku.php?idInformasi=".$row[0]."'><button type='button' class='btn btn-default'><i class='fa fa-pencil'></i> Edit</button></a>&nbsp;<a href='daftar-toko/php/delete-data-toko-buku.php?idInformasi=".$row[0].">&nbsp;<button type='button' class='btn btn-default'><i class='fa fa-eraser'></i> Delete</button></a>&nbsp;<a href='#'><button type='button' class='btn btn-default'><i class='fa fa-eye'></i> View</button></a></td></tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="../assets/jQuery-1.11.2/jquery-1.11.2.js"></script>
<script type="text/javascript" src="../assets/Bootstrap-3.3.1/js/bootstrap.js"></script>