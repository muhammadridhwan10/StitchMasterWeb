<?php
include '../koneksi.php';

$sql = "SELECT * FROM models";
$query = mysqli_query($mysqli, $sql);
while($data = mysqli_fetch_array($query)){
	$item[] = array(
		'id'  	       		 =>$data["id"],
		'id_penjahit'  		=>$data["id_penjahit"],
		'name_model'		    	=>$data["name_model"],
		'price'	       	 	=>$data["price"],
		'material'			=>$data["material"],
		'stock'         	=>$data["stock"],
		'description'		=>$data["description"],
		'estimasi_selesai'	=>$data["estimasi_selesai"],
		'category_id'		=>$data["category_id"],
		'image'		    	=>$baseUrl."asset/upload/model/".$data["image"]."",
		'created_at'		=>$data["created_at"],
		'updated_at'    	=>$data["updated_at"],
		
	);
}

$response = array(
	'success' => 1,
	'message' => 'Get Model Berhasil',
	'models' => $item
);

echo json_encode($response);
?>