<?php
include "../controller/function.php";
$nis = $_POST['nis'];
$nama = $_POST['nama_sales'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$cabang = $_POST['cabang'];
$stmt = "insert into sales values('$nis', '$nama', '$alamat', '$telp', '$cabang')";
if(inputData($stmt)){
	echo '{"status":"Data Sales Berhasil Disimpan"}';
} else{
	echo '{"status":"Data Dales Gagal Disimpan"}';
}
?>