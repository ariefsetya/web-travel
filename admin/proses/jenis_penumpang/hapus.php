<?php
include '../../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM jenis_penumpang WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Jenis Penumpang berhasil dihapus";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=jenis_penumpang");
}else{
	$_SESSION['message'] = "Data Jenis Penumpang gagal dihapus";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=jenis_penumpang");
}