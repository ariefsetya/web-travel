<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$konfirmasi = isset($_POST['konfirmasi']) ? 1:0;

$sql = "INSERT INTO metode_pembayaran (nama, konfirmasi) VALUES ('".$nama."', ".$konfirmasi.")";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Metode Pembayaran berhasil disimpan";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=metode_pembayaran");
}else{
	$_SESSION['message'] = "Data Metode Pembayaran gagal disimpan";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=metode_pembayaran");
}