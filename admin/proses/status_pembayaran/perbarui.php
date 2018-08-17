<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$id = $_POST['id'];

$sql = "UPDATE status_pembayaran SET nama='".$nama."' WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Status Pembayaran berhasil diperbarui";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=status_pembayaran");
}else{
	$_SESSION['message'] = "Status Pembayaran gagal diperbarui";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=status_pembayaran");
}