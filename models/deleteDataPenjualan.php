<?php
	include "../controller/function.php";
	$no_so = $_GET['no_so'];
	$stmt = "delete from penjualan where no_so='$no_so'";
	if(delete($stmt)){
		$status = "Data berhasil dihapus";
	} else{
		$status = "Data gagal dihapus";
	}
	echo '{"status":"'.$status.'"}';
?>