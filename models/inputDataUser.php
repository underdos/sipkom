<?php
	include "../controller/function.php";
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$jabatan = $_POST['jabatan'];
	$cabang = $_POST['cabang'];
	if($jabatan == "admin"){
		$level = 1;
	}else if($jabatan == "staff accounting"){
		$level = 2;
	}else if($jabatan == "staff ccc"){
		$level = 3;
	}else if($jabatan == "bc"){
		$level = 4;
	}else if($jabatan == "kasir"){
		$level =5;
	}else{
		$level = "";
	}
	$stmt = "insert into user values('$nip', '$nama', '$username', '$password', '$jabatan', '$cabang', $level)";
	if(inputData($stmt)){
		echo '{"status":"Data Sales Berhasil Disimpan"}';
	} else{
		echo '{"status":"Data Dales Gagal Disimpan"}';
	}
?>