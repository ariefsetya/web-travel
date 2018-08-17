<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$id = $_POST['id'];


$sql = "UPDATE Transportasi SET nama='".$nama."'WHERE id ='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = " Data Transportasi berhasil diperbarui";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=Transportasi");
}else{
	$_SESSION['message'] = "Data Transportasi gagal diperbarui";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=Transportasi");
}