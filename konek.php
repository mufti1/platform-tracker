<?php 
	$host='localhost';
	$username='root';
	$password='';
	$db='pt';

	$mysqli=new mysqli($host,$username,$password,$db);
	if (mysqli_connect_errno()) {
		echo "ERROR: Could not connect to database";
		exit;
	}
 ?>