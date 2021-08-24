<?php
include '../koneksi.php';
$data = array();
$response = array();
$mkriteria = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = $_POST['id'];
	$result1 =$mysqli->query("SELECT
								a.id_kriteria,
								a.kriteria,
								b.id_transaksi_detail,
								b.nilai
								FROM tbl_kriteria a
								LEFT JOIN tbl_rating_detail b ON b.id_kriteria=a.id_kriteria AND b.id_transaksi_detail='$id'
								ORDER BY a.id_kriteria ASC");
	if($result1->num_rows>0){
		while($row=$result1->fetch_array()){
			$data['id'] 		=$row['id_transaksi_detail'];
			$data['id_kriteria']=$row['id_kriteria'];
			$data['kriteria']	=$row['kriteria'];
			$data['rating']		=$row['nilai'];
			array_push($mkriteria,$data);
		}
	}
	
	$result2 =$mysqli->query("SELECT
								a.id,
								b.name,
								b.image,
								c.nama,
								d.kode_trx
								FROM transaksi_details a
								LEFT JOIN models b ON b.id=a.models_id
								LEFT JOIN tbl_penjahit c ON c.id_penjahit=b.id_penjahit
								LEFT JOIN transaksis d ON d.id=a.transaksi_id
								WHERE a.id='$id'
								LIMIT 1");
	if($result2->num_rows>0){
		while($row=$result2->fetch_array()){
			$response['kode']  		=$row['kode_trx'];
			$response['model']		=$row['name'];
			$response['penjahit']	=$row['nama'];
			$response['foto']		=$baseUrl."asset/upload/model/".$row['image']."";
			$response['mkriteria']	=$mkriteria;
			$response['status']		=true;
			array_push($response,$a);
		}
	}else{
		$response['status']=false;
	}
	echo json_encode($response);
}
?>