<?php 
	session_start();
	include'konek.php';
	if (isset($_POST['username'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$query="SELECT * FROM user where username='$user' and password='$pass'";
	$result=$mysqli->query($query);
	$num_result=$result->num_rows;

	if ($num_result > 0) {
		$row=$result->fetch_assoc();
		extract($row);

		$_SESSION['username'] = $user;
		header('Location:app/index.php');
	}
	else
	{
		echo "login gagal";
	}
	$result->free();
	$mysqli->close();
	}
	
 ?>