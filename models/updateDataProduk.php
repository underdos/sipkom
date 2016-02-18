<?php
	include "../controller/function.php";
	$no_seri= $_POST['no_seri'];
	$nama_produk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$persentase = $_POST['persentase'];
	$stmt = "update produk set nama_produk='$nama_produk', harga='$harga', persentase='$persentase' where no_seri='$no_seri'";
	if(updateData($stmt)){
		echo '{"status":"Data Produk berhasil diupdate"}';
	} else{
		echo '{"status":"Data Produk gagal diupdate"}';
	}
?>