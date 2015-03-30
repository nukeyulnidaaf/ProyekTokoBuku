<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "tokobukuonline";

    $firstConnection = mysql_connect($server, $username, $password);
    mysql_select_db($databaseName, $firstConnection);