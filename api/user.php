<?php
include '../koneksi.php';
$sql = "SELECT * FROM users";
$query = mysqli_query($mysqli, $sql);
while($data = mysqli_fetch_array($query)){
	$item[] = array(
		'name' =>$data["name"],
		'email' =>$data["email"],
		'phone' =>$data["phone"],
		
	);
}

$response = array(
	'success' => 1,
	'message' => 'Get User Berhasil',
	'user' => $item
);

echo json_encode($response);
?>