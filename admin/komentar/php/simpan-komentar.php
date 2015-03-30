<?php
	include("../../../utils/DB-Connection.php");
	session_start();
	$idInformasi = $_REQUEST['idInformasi'];
	$sql = "INSERT INTO komentar VALUES('','".$_REQUEST['isiKomentar']."','".$_SESSION['username']."','".$idInformasi."',NOW())";
	$result = mysql_query($sql) or die(mysql_error());

	echo "<meta http-equiv='refresh' content='0; url=../../komentar.php'>";
