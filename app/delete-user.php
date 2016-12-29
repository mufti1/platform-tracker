<?php 
	include('konek.php');
	if (isset($_GET['user_id'])) {
		$sql = "delete from user where user_id =".$_GET['user_id'];
		if ($con->query($sql)) {
			header('Location:user.php');
		}
		else{
			echo "gagal menghapus data";
		}
	}
 ?>