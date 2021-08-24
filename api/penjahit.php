<?php
include '../koneksi.php';
$a = array();
$response = array();
$result =$mysqli->query("SELECT * FROM tbl_penjahit");
if($result->num_rows>0){
	$no=1;
	while($row=$result->fetch_array()){
		$a['nomor']  	=$no;
		$a['id']  		=$row['id_penjahit'];
		$a['nama']		=$row['nama'];
		$a['telepon']	=$row['telepon'];
		$a['email']		=$row['email'];
		$a['alamat']	=$row['alamat'];
		$a['latitude']	=$row['latitude'];
		$a['longitude']	=$row['longitude'];
		$a['foto']		=$baseUrl."asset/upload/penjahit/".$row['foto']."";
		$no++;
		array_push($response,$a);
	}
}
echo json_encode($response);
?>