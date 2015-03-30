<?php
	include('../../utils/DB-Connection.php');
	$sql = "DELETE FROM komentar WHERE id_komentar='".$_REQUEST['idKomentar']."'";
	$result = mysql_query($sql) or die(mysql_error());

	echo "<meta http-equiv='Refresh' content='0; url=../komentar.php'>";