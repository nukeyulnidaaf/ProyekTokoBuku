<?php
    include("../../../utils/DB-Connection.php");
    if($_FILES['fileToUpload']['name']===""){

    }
    else{
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
    }

    $lokasiTokoBuku = $_REQUEST['lokasiTokoBuku'];

    $sql = "UPDATE informasi SET alamat='".$_REQUEST['alamatTokoBuku']."',nama_toko='".$_REQUEST['namaTokoBuku']."',no_telp='".$_REQUEST['nomerTelphoneTokoBuku']."',jam_operasional='".$_REQUEST['jamOperasionalTokoBuku']."',lang='".$_REQUEST['lang']."',lat='".$_REQUEST['lat']."',id_wilayah='".$lokasiTokoBuku."' WHERE id_informasi = '".$_REQUEST['idInformasi']."'";
    $result = mysql_query($sql) or die(mysql_error());
    echo "<meta http-equiv='Refresh' content='0; url=../../daftar-toko.php'>";