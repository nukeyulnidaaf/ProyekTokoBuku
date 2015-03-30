<html>
	<head>
		<title>Toko Buku Online Surabaya</title>
		<link rel="stylesheet" type="text/css" href="assets/Bootstrap-3.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/Custom-Configuration/css/custom.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<ul class="nav nav-tabs">
		  			<li role="presentation" class="active"><a href="index.php">Home</a></li>
		  			<li role="presentation"><a href="daftar-toko-buku.php">Daftar Toko Buku</a></li>
				</ul>
			</div>
			<br>
			<div class="row">
				<?php
					include('utils/DB-Connection.php');
					$sql = "SELECT SUM(jp.jumlah_pengunjung), i.nama_toko, i.foto, i.alamat, i.id_informasi FROM jumlah_pengunjung jp INNER JOIN informasi i ON i.id_informasi=jp.id_informasi GROUP BY i.nama_toko DESC LIMIT 3";
					$result = mysql_query($sql) or die(mysql_error());
					while($row = mysql_fetch_array($result)){
					echo "<div class='col-sm-6 col-md-4'>";
			    	echo "<div class='thumbnail'>";
			      	echo "<img src='images/".$row[2]."' alt=".$row[1]." width='50%' height='50%'>";
			      	echo "<div class='caption'>";
			        echo "<h3>".$row[1]."</h3>";
			        echo "<p>".$row[3]."</p>";
			        echo "<p><a href='view-data.php?idInformasi=".$row[4]."' class='btn btn-default col-md-12' role='button'>View Data</a></p>";
			      	echo "</div>";
			    	echo "</div>";
			  		echo "</div>";
					}
				?> 
			</div>
		</div>
	</body>
</html>