<?php
include '../koneksi.php';

function get_transaksi() {

$sql = "SELECT * FROM transaksis";
$query = mysqli_query($mysqli, $sql);
while($data = mysqli_fetch_array($query)){
	$item[] = array(
		'id' =>$data["id"],
		'user_id' =>$data["user_id"],
		'total_item' =>$data["total_item"],
        'total_harga' =>$data["total_hargal"],
        'status' =>$data["status"],
        'name' =>$data["name"],
        'detail_ukuran' =>$data["detail_ukuran"],
        'phone' =>$data["phone"],
        'description' =>$data["description"],
        'kode_trx' =>$data["kode_trx"],
        'no_antrian' =>$data["no_antrian"],
        'created_at' =>$data["created_at"],
        'updated_at' =>$data["updated_at"],
		
	);
}

    $response = array(
	'status' => 'Get Transaksi Berhasil',
	'transaksi' => $item
    );

    echo json_encode($response);

}

?>