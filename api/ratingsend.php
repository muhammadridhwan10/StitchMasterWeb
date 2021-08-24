<?php
include '../koneksi.php';
$response = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id 		= $_POST['id'];
	$kriteria 	= $_POST['kriteria'];
	$rating 	= intval($_POST['rating']);
	$cek =$mysqli->query("SELECT * FROM tbl_rating_detail a WHERE a.id_kriteria='$kriteria' AND a.id_transaksi_detail='$id'");
	if($cek->num_rows>0){
		$mysqli->query("UPDATE tbl_rating_detail SET nilai='$rating' WHERE id_kriteria='$kriteria' AND id_transaksi_detail='$id'");
	}else{
		$mysqli->query("INSERT INTO tbl_rating_detail(id_transaksi_detail,id_kriteria,nilai) VALUES('$id','$kriteria','$rating')");
	}
	$response['status']='sukses';
	echo json_encode($response);
}
?>