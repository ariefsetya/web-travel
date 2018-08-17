<?php
include '../../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM rute WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Rute berhasil dihapus";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=rute");
}else{
	$_SESSION['message'] = "Data Rute gagal dihapus";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=rute");
}