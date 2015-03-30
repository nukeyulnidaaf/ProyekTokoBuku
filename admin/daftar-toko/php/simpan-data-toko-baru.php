<?php
    include("../../../utils/DB-Connection.php");
    //Generate ID Informasi
    $sql = "SELECT COUNT(id_informasi) FROM informasi";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
    if($row[0]==="0"){
        $idInformasi = 1;
    }
    else{
        $idInformasi = $row[0] + 1;
    }

    //Upload File
    $target_dir = "../../../images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $temp = explode(".",$_FILES["fileToUpload"]["name"]);
    $newName = $_REQUEST['namaTokoBuku'] . "." . end($temp);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newName)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }
    
    $lokasiTokoBuku = $_REQUEST['lokasiTokoBuku'];

    $sql = "INSERT INTO informasi VALUES('".$idInformasi."','".$_REQUEST['alamatTokoBuku']."','".$newName."','".$_REQUEST['namaTokoBuku']."','".$_REQUEST['nomerTelphoneTokoBuku']."','".$_REQUEST['jamOperasionalTokoBuku']."','".$_REQUEST['lang']."','".$_REQUEST['lat']."','".$lokasiTokoBuku."')";
    $result = mysql_query($sql) or die(mysql_error());
    $sql = "INSERT INTO jumlah_pengunjung VALUES ('',DATE_FORMAT(NOW(),'%M'),year(now()),'0','".$idInformasi."')";
    $result = mysql_query($sql) or die(mysql_error());
    echo "<meta http-equiv='Refresh' content='0; URL=../../daftar-toko.php'>";