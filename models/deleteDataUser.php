<?php
	include "../controller/function.php";
	$nip = $_GET['nip'];
	$stmt = "delete from user where nip='$nip'";
	if(delete($stmt)){
		$status = "Data berhasil dihapus";
	} else{
		$status = "Data gagal dihapus";
	}
	echo '{"status":"'.$status.'"}';
?>