<?php
function connect(){
	global $pdo;
	try{
		$pdo = new PDO("mysql:host=localhost; dbname=sipkom", 'root', '261291net');
	}catch(PDOException $e){
		die ('Gagal Konek ke database'.$e->getMessage());
	}
}
function login ($username, $password){
	global $pdo;
	connect();
	$stmt = "select * from user where username= :username and password= :password;";
	$query = $pdo->prepare($stmt);
	$query->bindParam('username',$username);
	$query->bindParam('password',$password);
	$query->execute();
	$result_data = $query->fetch();
	if($result_data['username']==$username && $result_data['password']==$password){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $result_data['nama'];
		$_SESSION['jabatan'] = $result_data['jabatan'];
		$_SESSION['level'] = $result_data['level'];
		return true;
	}else{
		return false;
	}
}
function redirect($link){
	header("location:$link");
}
function ceklogin(){
	if(!isset($_SESSION['username'])){
		return true	;
	} else{
		return false;
	}
}
function inputData($stmt){
	global $pdo;
	connect();
	$query = $pdo->prepare($stmt);
	$query->execute();
	if($query){
		return true;
	}else{
		return false;
	}
}
function updateData($stmt){
	global $pdo;
	connect();
	$query = $pdo->prepare($stmt);
	$query->execute();
	if($query){
		return true;
	}else{
		return false;
	}
}
function tampilData($stmt){
	global $pdo;
	connect();
	$query = $pdo->prepare($stmt);
	try {
		$query->execute();
	} catch(PDOException $e){
		die($e->getMessage());
	}
	return $query->fetchAll();
}
function delete($stmt){
	global $pdo;
	connect();
	$query = $pdo->prepare($stmt);
	if($query->execute()){
		return true;
	} else {
		return false;
	}
}
function jmlData($stmt){
	global $pdo;
	connect();
	$query = $pdo->prepare($stmt);
	try {
		$query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
	}
	return $query->fetch();
}
function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }
        return $temp;
}
function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }
    return $hasil;
}
?>
