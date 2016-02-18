<?php
	include "../controller/function.php";
	$no_seri= $_POST['no_seri'];
	$nama_produk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$persentase = $_POST['persentase'];
	$stmt = "insert into produk values('$no_seri', '$nama_produk', '$harga', '$persentase')";
	if(inputData($stmt)){
		echo '{"status":"Data Produk Berhasil Disimpan"}';
	} else{
		echo '{"status":"Data Produk Gagal Disimpan"}';
	}
?>