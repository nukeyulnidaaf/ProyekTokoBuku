<?php
	include("../../../utils/DB-Connection.php");
	$sql = "DELETE FROM informasi WHERE id_informasi ='".$_REQUEST['idInformasi']."'";
	$result = mysql_query($sql) or die(mysql_error());
	echo "Proses Delete Data Toko Buku";
	echo "<meta http-equiv='refresh' content='0; url=../../daftar-toko.php'>";