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
	$stmt = "update user set nip='$nip', nama='$nama', username='$username', password='$password', jabatan='$jabatan', level=$level, cabang='$cabang' where nip='$nip'";
	if(updateData($stmt)){
		echo '{"status":"Data user berhasil diupdate"}';
	} else{
		echo '{"status":"Data user gagal diupdate"}';
	}
?>