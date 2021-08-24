<?php
include '../koneksi.php';

error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$status      	= "BATAL";
$update = "UPDATE transaksis SET status ='$status'
WHERE id=".$_GET['id'];
$exeinsert = mysqli_query($mysqli,$update);


$sql = "SELECT * FROM transaksis WHERE id=".$_GET['id'];
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
        'detail_ukuran' => $row['detail_ukuran'],
        'phone' => $row['phone'],
        'description' => $row['description'],
        'kode_trx' => $row['kode_trx'],
        'bank' => $row['bank'],
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
    'message' => 'Berhasil',
    'transaksi' => $result
);

echo json_encode($response);

$mData = [
    'title' => "Pemberitahuan",
    'body' => "Transaksi Dibatalkan"
];

$fcm[] = "fZck-oMnTKe9VsZXUhdhFe:APA91bHDx-wnChGTlsNE-wrNpd-j3Wl8k6FHBF7R1usa0E4-sNFh0jpGgiwDPlJz-_TKzBmASpbrRsoytsC_qxuZ68xj_amWo43NN_meY-fvmRqIl0HhuvFTLEclnADWM7wbNb0U3ve7";

$payload = [
    'registration_ids' => $fcm,
    'notification' => $mData
];

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
        "Content-type: application/json",
        "Authorization: key=AAAAGgbVgfU:APA91bHMEHBs3Txfz3AGHCPYot9SWzBAZFRQhPudAYZO9mbg5NpSG4MV8y6wZSUYxFy03F5pA9QLZonZ02d4bmd9f992ts7mFU26T3iCdabQVhQYT0TNhDlusgtVYxk07aSeBSUXZCv4"
    ),
));
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($curl);
curl_close($curl);


// $data = [
//     'success' => 1,
//     'message' => "Push notif success",
//     'data' => $mData,
//     'firebase_response' => json_decode($response)
//     ];
    
// echo json_encode($data);


?>