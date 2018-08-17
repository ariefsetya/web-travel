<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

$koneksi = mysqli_connect("localhost","root","","travel_web");
if(!isset($_SESSION['logged_in'])){
	$_SESSION['logged_in'] = false;
	$_SESSION['email'] = "";
	$_SESSION['nama'] = "";
	
	header("location:login.php");
}else{
	if($_SESSION['logged_in']==false){
		header("location:login.php");
	}
}
?>