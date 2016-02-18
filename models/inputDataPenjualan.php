<?php
	include "../controller/function.php";
	$no_so = $_POST['no_so'];
	$tanggal_so = $_POST['tanggal_so'];
	$no_seri_produk = $_POST['no_seri_produk'];
	$no_nis_sales = $_POST['no_nis_sales'];
	$quantity = $_POST['quantity'];
	$nama_customer = $_POST['nama_customer'];
	$alamat_customer = $_POST['alamat_customer'];
	$telp_customer = $_POST['telp_customer'];
	$cabang = $_POST['cabang'];
	$stmt = "insert into penjualan values('$no_so', '$tanggal_so', '$no_seri_produk', '$no_nis_sales', $quantity, '$nama_customer', '$alamat_customer', '$telp_customer', '$cabang', 'waiting')";
	if(inputData($stmt)){
		echo '{"status":"Data SO Penjualan Berhasil Disimpan"}';
	} else{
		echo '{"status":"Data SO Penjualan Gagal Disimpan"}';
	}
?>