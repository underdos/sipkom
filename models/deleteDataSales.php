<?php
	include "../controller/function.php";
	$nis = $_GET['nis'];
	$stmt = "delete from sales where nis='$nis'";
	if(delete($stmt)){
		$status = "Data berhasil dihapus";
	} else{
		$status = "Data gagal dihapus";
	}
	echo '{"status":"'.$status.'"}';
?>