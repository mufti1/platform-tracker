<?php 
	include('konek.php');
	if (isset($_GET['idx'])) {
		$sql = "delete from logs where idx =".$_GET['idx'];
		if ($con->query($sql)) {
			header('Location:logs.php');
		}
		else{
			echo "gagal menghapus data";
		}
	}
 ?>