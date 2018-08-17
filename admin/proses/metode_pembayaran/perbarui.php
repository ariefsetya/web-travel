<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$konfirmasi = isset($_POST['konfirmasi'])?1:0;
$id = $_POST['id'];


$sql = "UPDATE metode_pembayaran SET nama='".$nama."', konfirmasi=".$konfirmasi." WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Metode Pembayaran berhasil diperbarui";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=metode_pembayaran");
}else{
	$_SESSION['message'] = "Data Metode Pembayaran gagal diperbarui";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=metode_pembayaran");
}