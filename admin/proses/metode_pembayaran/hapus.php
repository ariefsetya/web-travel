<?php
include '../../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM metode_pembayaran WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Metode Pembayaran berhasil dihapus";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=metode_pembayaran");
}else{
	$_SESSION['message'] = "Data Metode Pembayaran gagal dihapus";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=metode_pembayaran");
}