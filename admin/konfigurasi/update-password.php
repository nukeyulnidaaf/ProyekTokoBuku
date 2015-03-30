<?php
	include("../../utils/DB-Connection.php");
	session_start();
	$sql = "UPDATE admin SET password='".$_REQUEST['passwordBaru']."' WHERE username='".$_SESSION['username']."'";
	mysql_query($sql) or die(mysql_error());

	echo "<meta http-equiv='refresh' content='0; url=../konfigurasi.php'>";