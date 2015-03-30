<?php
    include("../../../utils/DB-Connection.php");
    $sql = "SELECT lang FROM informasi WHERE nama_toko='".$_REQUEST['namaTokoBuku']."' AND no_telp='".$_REQUEST['nomerTelphoneTokoBuku']."'";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
    echo $row[0];