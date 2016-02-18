<?php
include "../controller/function.php";
$username = $_POST['username'];
$password = $_POST['password'];
if($username !="" && $password !=""){
	if(login($username,$password)){
		header('location:../index.php');
	}else{
		header('location:../login.php');
	}
}else{
	header('location:../login.php');
}
?>