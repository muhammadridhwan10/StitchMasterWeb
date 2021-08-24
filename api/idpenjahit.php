<?php
include '../koneksi.php';

if(empty($_GET)){
    $sql = "SELECT * FROM transaksis";
    $query = mysqli_query($mysqli, $sql);

    $result = array();
    while($row = mysqli_fetch_array($query)){
        array_push($result,array(
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
            'no_antrian' => $row['no_antrian'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ) );
    }

    echo json_encode(
    
        array('penjahit' => $result)
    );
}else{
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
            'no_antrian' => $row['no_antrian'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ) ;
    }

    $response = array(
        'success' => 1,
        'message' => 'Transaksi Berhasil',
        'transaksis' => $result
    );

    echo json_encode($response);


}
?>