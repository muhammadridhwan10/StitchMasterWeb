<?php
include '../koneksi.php';
$ambildata = mysqli_query($mysqli, "SELECT *
FROM models
INNER JOIN tbl_penjahit
ON models.id_penjahit = tbl_penjahit.id_penjahit");
while($data=mysqli_fetch_array($ambildata)){
    $rating=$data['rating']*100;
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
    $item[] = array(
        'id' =>$data["id"],
        'nama' =>$data["nama"],
        'name' =>$data["name"],
        'price' =>$data["price"],
        'material' =>$data["material"],
        'stock' =>$data["stock"],
        'description' =>$data["description"],
        'category_id' =>$data["category_id"],
        'estimasi_selesai' =>$data["estimasi_selesai"],
        'image'		    =>$baseUrl."asset/upload/model/".$data["image"]."",
        'rating' =>$rating_status,
        'created_at' =>$data["created_at"],
        'updated_at' =>$data["updated_at"],
		
	);
}

$response = array(
	'success' => 1,
	'message' => 'Get model Berhasil',
	'models' => $item,
);

echo json_encode($response);
?>