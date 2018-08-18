<?php

include '../koneksi.php';

$id = $_POST['id'];

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "INSERT INTO penumpang (transaksi_id, jenis_penumpang_id, nik, nama, tanggal_lahir) 
		VALUES ('$id','".$jenis[$i]."','".$nik[$i]."','".$nama[$i]."','".$tanggal_lahir[$i]."')";
$insert = mysqli_query($koneksi,$sql);


if($insert){
	header("location: ../index.php?m=pembayaran&id=".$id);
}else{
	header("location: ../index.php");
}