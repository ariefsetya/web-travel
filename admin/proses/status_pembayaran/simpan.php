<?php
include '../../koneksi.php';

$nama = $_POST['nama'];

$sql = "INSERT INTO status_pembayaran (nama) VALUES ('".$nama."')";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Status Pembayaran berhasil disimpan";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=status_pembayaran");
}else{
	$_SESSION['message'] = "Status Pembayaran gagal disimpan";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=status_pembayaran");
}