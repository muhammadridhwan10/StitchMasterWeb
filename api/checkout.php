<?php
include '../koneksi.php';
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$user_id     	= $data['user_id'];
$total_item  	= $data['total_item'];
$total_harga 	= $data['total_harga'];
$total_transfer = $data['total_transfer'];
$bank 	        = $data['bank'];
$status      	= "MENUNGGU";
$name        	= $data['name'];
$estimasi        	= $data['estimasi'];
$phone 			= $data['phone'];
$detail_ukuran 	= $data['detail_ukuran'];
$models 		= $data['models'];

// fungsi untuk membuat kode transaksi
$query_id = mysqli_query($mysqli, "SELECT RIGHT(no_antrian,4) as nomor FROM transaksis
ORDER BY id DESC LIMIT 1");
$count = mysqli_num_rows($query_id);
if ($count <> 0) {
// mengambil data kode transaksi
$data_id = mysqli_fetch_assoc($query_id);
$nomor    = $data_id['nomor']+1;
} else {
$nomor = 1;
}

// buat kode_transaksi
$tahun          = date("Y");
$buat_id        = str_pad($nomor, 4, "0", STR_PAD_LEFT);
$rand           = rand(1, 100);
$kode_trx       = "TM-$tahun-$buat_id";
$kode_payment   = "TM-$tahun-$rand";
$kode_unik      = rand(1, 999);
$no_antrian     = str_pad($nomor, 1, "0", STR_PAD_LEFT);
$created_at     = date('Y-m-d H:i:s');
$updated_at     = date('Y-m-d H:i:s');

$insert = "INSERT INTO transaksis(user_id,total_item,total_harga,status,name,detail_ukuran,phone,
kode_trx,kode_payment,total_transfer,kode_unik,bank,estimasi,no_antrian,created_at,updated_at) VALUES ('$user_id','$total_item','$total_harga','$status','$name','$detail_ukuran','$phone','$kode_trx','$kode_payment','$total_transfer','$kode_unik','$bank','$estimasi','$no_antrian','$created_at','$updated_at')";

$exeinsert = mysqli_query($mysqli,$insert);
$transaksi_id= mysqli_insert_id($mysqli);

foreach($models as $model){
	$insert2 = "INSERT INTO transaksi_details(transaksi_id, models_id, total_item, catatan, total_harga) 
	VALUES ('$transaksi_id', '".$model['id']."', '".$model['total_item']."', '".$model['catatan']."', '".$model['total_harga']."')";

	$exe2insert = mysqli_query($mysqli,$insert2);
}

$sql = "SELECT * FROM transaksis";
$query = mysqli_query($mysqli, $sql);
$result = array();

while($row = $query->fetch_assoc()){
    $result = array(
        'id' => $row['id'],
        'user_id' => $row['user_id'],
        'total_item' => $row['total_item'],
        'total_harga' => $row['total_harga'],
        'status' => $row['status'],
        'name' => $row['name'],
        'phone' => $row['phone'],
        'kode_trx' => $row['kode_trx'],
        'bank' => $row['bank'],
        'estimasi' => $row['estimasi'],
        'total_transfer' => $row['total_transfer'],
        'kode_payment' => $row['kode_payment'],
        'kode_unik' => $row['kode_unik'],
        'no_antrian' => $row['no_antrian'],
        'created_at' => $row['created_at'],
        'updated_at' => $row['updated_at'],
    ) ;
}


$response = array(
	'success' => 1,
	'message' => 'Transaksi Berhasil',
	'transaksi' => $result 
);

echo json_encode($response);

?>