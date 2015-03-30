<?php
session_start();
include('../../utils/DB-Connection.php');
    $Username = $_REQUEST['Username'];
    $Password = $_REQUEST['Password'];
    
$sql = "SELECT * from admin WHERE username ='".$Username."' and password ='".$Password."' ";
$Result = mysql_query($sql) or die(mysql_error());
$countResult = mysql_num_rows($Result);
if ($countResult == 0){
   echo "<meta http-equiv = 'refresh' content = '0; url=../index.php'>";
}
else{
	$row = mysql_fetch_array($Result);
	$_SESSION['username'] = $row[1];
	$_SESSION['password'] = $row[0];
   	echo "<meta http-equiv = 'refresh' content = '0; url=../beranda.php'>";
}

    