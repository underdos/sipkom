<?php
	include "../controller/function.php";
	$nis = $_POST['nis'];
	$nama = $_POST['nama_sales'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$cabang = $_POST['cabang'];
	$stmt = "update sales set nama_sales='$nama', alamat='$alamat', telp='$telp', cabang='$cabang' where nis='$nis'";
	if(updateData($stmt)){
		echo '{"status":"Data sales berhasil diupdate"}';
	} else{
		echo '{"status":"Data sales gagal diupdate"}';
	}
?>