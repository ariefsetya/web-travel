<?php
include '../../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM kota WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Kota berhasil dihapus";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=kota");
}else{
	$_SESSION['message'] = "Data Kota gagal dihapus";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=kota");
}