<?php
	include "../controller/function.php";
	$no_so = $_GET['no_so'];
	$status = $_GET['status'];
	$stmt = "update penjualan set status = '$status' where no_so = '$no_so'";
	if(delete($stmt)){
	    $status = "Data berhasil diupdate";
	} else{
	    $status = "Data gagal diupdate";
	}
	echo '{"status":"'.$status.'"}';
?>