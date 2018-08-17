<?php
include '../../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM status_pembayaran WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Status Pembayaran berhasil dihapus";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=status_pembayaran");
}else{
	$_SESSION['message'] = "sTATUS pembayaran gagal dihapus";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=status_pembayaran");
}