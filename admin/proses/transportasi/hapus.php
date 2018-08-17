<?php
include '../../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM Transportasi WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Transportasi berhasil dihapus";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=Transportasi");
}else{
	$_SESSION['message'] = "Data Transportasi gagal dihapus";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=Transportasi");
}