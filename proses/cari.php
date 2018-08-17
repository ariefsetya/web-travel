<?php
include '../koneksi.php';

$_SESSION['kota_asal'] = $_POST['kota_asal'];
$_SESSION['kota_tujuan'] = $_POST['kota_tujuan'];
$_SESSION['tanggal'] = $_POST['tanggal'];
$_SESSION['penumpang'] = $_POST['penumpang'];

header("location:../index.php?m=pencarian");
?>