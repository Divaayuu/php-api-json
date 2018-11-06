<?php
include "koneksi.php";
$id = '';
$success = true;
$message = "";
$code = "";
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
$ambil = mysqli_query($koneksi, "SELECT * FROM user where id = $id");
if (mysqli_num_rows($ambil)>0){
$success = true;
$message = "Yay jadiii";
$code = "200";
}
else {
	$success = false;
	$message = "Yah gagal";
	$code = 204;
}
$hasil = array();
$hasil ["sukses"] = $success;
$hasil ["data"] = array();
$hasil ["pesan"] = $message;
$hasil ["kode"] = $code;



while($row = mysqli_fetch_assoc($ambil)){   
	$data['id'] = $row["id"];
	$data['username'] = $row["username"];
	$data['password'] = $row["password"];
	$data['level'] = $row["level"];
	$data['fullname'] = $row["fullname"];
	array_push($hasil["data"],$data);
}
echo json_encode($hasil);