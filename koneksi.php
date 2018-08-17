<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

$_SESSION['kota_asal'] = isset($_SESSION['kota_asal'])?$_SESSION['kota_asal']:"";
$_SESSION['kota_tujuan'] = isset($_SESSION['kota_tujuan'])?$_SESSION['kota_tujuan']:"";
$_SESSION['tanggal'] = isset($_SESSION['tanggal'])?$_SESSION['tanggal']:"";
$_SESSION['penumpang'] = isset($_SESSION['penumpang'])?$_SESSION['penumpang']:"";

function generateCode($length = 5) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$koneksi = mysqli_connect("localhost","root","","travel_web");
if(!isset($_SESSION['logged_in'])){
	$_SESSION['logged_in'] = false;
	$_SESSION['email'] = "";
	$_SESSION['password'] = "";

//	header("location:login.php");
}
?>