<?php
include '../koneksi.php';
$a = array();
$response = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = $_POST['id'];
	$result =$mysqli->query("SELECT * FROM models WHERE id_penjahit='$id'");
	if($result->num_rows>0){
		$no=1;
		while($row=$result->fetch_array()){
		    $rating=$row['rating']*100;
            $rating_status='-';
            if($rating <=25){
               $rating_status="Kurang Bagus";
            }else if($rating >25 && $rating <=50){
                $rating_status="Cukup Bagus";
            }else if($rating >50 && $rating <=75){
                $rating_status="Bagus";
            }else if($rating >75 && $rating <=100){
                $rating_status="Sangat Bagus";
            }
			$a['id']  				=$row['id'];
			$a['penjahit']  		=$row['id_penjahit'];
			$a['nama']				=$row['name'];
			$a['price']				=number_format($row['price']);
			$a['material']			=$row['material'];
			$a['stock']				=$row['stock'];
			$a['description']		=$row['description'];
			$a['estimasi']			=$row['estimasi_selesai'];
			$a['category_id']		=$row['category_id'];
			$a['created_at']		=$row['created_at'];
			$a['updated_at']		=$row['updated_at'];
			$a['rating']			=$rating_status;
			$a['foto']				=$baseUrl."asset/upload/model/".$row['image']."";
			$no++;
			array_push($response,$a);
		}
	}
}
echo json_encode($response);
?>