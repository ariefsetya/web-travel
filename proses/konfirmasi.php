<?php

include '../koneksi.php';


$code = $_POST['code'];
$sql = "SELECT * FROM transaksi WHERE code='$code'";
$result = mysqli_query($koneksi,$sql);
$result = mysqli_fetch_assoc($result);
$id = $result['id'];
$response = "";
$title = "Error!";
$status = "red";

if(!empty($result)){

	$target_dir_no_dots = "assets/bukti_konfirmasi/";
	$target_dir = "../".$target_dir_no_dots;
	$imageFileType = strtolower(pathinfo(basename($_FILES["bukti"]["name"]),PATHINFO_EXTENSION));
	$target_file = $target_dir . $code.".".$imageFileType;
	$target_file_save = $target_dir_no_dots . $code.".".$imageFileType;
	$uploadOk = 1;

    $check = getimagesize($_FILES["bukti"]["tmp_name"]);
    if($check !== false) {
        $response =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $response = "File is not an image.";
        $uploadOk = 0;
    }

	if ($_FILES["bukti"]["size"] > 500000) {
	    $response = "Sorry, your file is too large.";
	    $uploadOk = 0;
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
	    $response = "Sorry, only JPG, JPEG & PNG files are allowed.";
	    $uploadOk = 0;
	}

	if ($uploadOk == 0) {
	    $response = "Sorry, your file was not uploaded.";

	} else {
	    if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
	        $response = "The file ". basename( $_FILES["bukti"]["name"]). " has been uploaded.";


			$sql = "UPDATE pembayaran SET bukti_konfirmasi='$target_file_save', status_pembayaran_id=3 WHERE transaksi_id='$id'";
			$insert = mysqli_query($koneksi,$sql);

			if($insert){
				$title = "Success!";
				$status = "blue";
				$response = "Bukti Konfirmasi berhasil diupload";
			}else{
				$response = "Bukti Konfirmasi gagal diupload";
			}
	    } else {
	        $response = "Sorry, there was an error uploading your file.";
	    }
	}
}
else{
	$response = "Kode Booking tidak ditemukan";
}

$_SESSION['message'] = $response;
$_SESSION['status'] = $status;
$_SESSION['title'] = $title;
header("location:../index.php?m=konfirmasi");