<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'database/koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from tb_admin where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);


if($cek > 0){

	while($d = mysqli_fetch_array($data)){
		$_SESSION['nm'] = $d['nama'];
	}
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	

	header("location:dashboard.php");
}else{
	header("location:index.php");
}
?>