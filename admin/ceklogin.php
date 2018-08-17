<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

$koneksi = mysqli_connect("localhost","root","","travel_web");

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$pass = md5($_POST['password']);

	$sql = "SELECT * FROM user WHERE jenis='admin' AND email='$email'
			AND password = '$pass'";
	$res = mysqli_query($koneksi,$sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		$_SESSION['email'] = $row['email'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['logged_in'] = true;
	}
	header("location:index.php");
}else{
	header("location:index.php");
}