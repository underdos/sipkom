<?php
	include "../controller/function.php";
	$no_seri = $_GET['no_seri'];
	$stmt = "delete from produk where no_seri='$no_seri'";
	if(delete($stmt)){
		$status = "Data berhasil dihapus";
	} else{
		$status = "Data gagal dihapus";
	}
	echo '{"status":"'.$status.'"}';
?>