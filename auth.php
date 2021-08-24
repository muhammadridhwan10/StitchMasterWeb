<?php
session_start();
include ("koneksi.php");
$username = $_POST['username'];
$password = $_POST['password'];
$result=$mysqli->query("SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
if($result->num_rows >0){
	$no=1;
	$output.='<markers>';
	while ($row=$result->fetch_assoc()) {
		$_SESSION['id_admin'] 	= $row['id_admin'];
		$_SESSION['username'] 	= $row['username'];
		$_SESSION['nama'] 		= $row['nama'];
		$_SESSION['telepon'] 	= $row['telepon'];
		$_SESSION['email'] 		= $row['email'];
		$_SESSION['foto'] 		= $row['foto'];
		$_SESSION["is_login"] 	= TRUE;
		header("location:index.php");
	}
}else{
	echo"
	<script language='JavaScript'>
		alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
		document.location='index.php';
	</script>";
}
 ?>