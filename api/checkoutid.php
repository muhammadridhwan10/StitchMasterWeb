<?php
include '../koneksi.php';

 //query tabel Mahasiswa
 $sql="SELECT * FROM transaksis WHERE user_id=".$_GET['id'];
 $query = mysqli_query($mysqli, $sql);

 //buat data mahasiswa menjadi array 
 $transaksi=array(); 
 //looping data dari queryMahasiswa
 while ($row=mysqli_fetch_array($query)) {

        $x['id'] = $row['id'];
        $x['user_id'] = $row['user_id'];
        $x['total_item'] = $row['total_item'];
        $x['total_harga'] = $row['total_harga'];
        $x['status'] = $row['status'];
        $x['name'] = $row['name'];
        $x['detail_ukuran'] = $row['detail_ukuran'];
        $x['phone'] = $row['phone'];
        $x['description'] = $row['description'];
        $x['kode_trx'] = $row['kode_trx'];
        $x['bank'] = $row['bank'];
        $x['total_transfer'] = $row['total_transfer'];
        $x['kode_payment'] = $row['kode_payment'];
        $x['kode_unik'] = $row['kode_unik'];
        $x['no_antrian'] = $row['no_antrian'];
        $x['created_at'] = $row['created_at'];
        $x['updated_at'] = $row['updated_at'];
        

        $user = $row['user_id'];
        $sql4 = "SELECT a.*,b.* FROM transaksis a
                LEFT JOIN users b ON b.id = a.user_id 
                WHERE a.user_id = '$user'";
        $query4 = mysqli_query($mysqli, $sql4);
        while($row4 = $query4->fetch_assoc()){
            $x['user']['id'] = $row4['id'];
            $x['user']['name'] = $row4['name'];
            $x['user']['phone'] = $row4['phone'];
            $x['user']['email'] = $row4['email'];
        }
        $x['details']=array();

  $transaksis = $row['id'];
  $sql2 ="SELECT a.*,b.* FROM transaksi_details a
  LEFT JOIN transaksis b ON b.id = a.transaksi_id 
  WHERE a.transaksi_id ='$transaksis'";

  $query2 = mysqli_query($mysqli, $sql2); 
  $i = 0;
  //looping data dari queryMK
  while ($row2=mysqli_fetch_array($query2)) {
    $y['id'] = $row2['id'];
    $y['transaksi_id'] = $row2['transaksi_id'];
    $y['models_id'] = $row2['models_id'];
    $y['total_item'] = $row2['total_item'];
    $y['catatan'] = $row2['catatan'];
    $y['total_harga'] = $row2['total_harga'];
    $model = $row2['models_id'];

    $sql7 = "SELECT a.*,b.* FROM transaksi_details a
    LEFT JOIN models b ON b.id = a.models_id 
    WHERE a.models_id = '$model'";
        $query7 = mysqli_query($mysqli, $sql7);
        while($row7 = $query7->fetch_assoc()){
        $y['model']['id'] = $row7['id'];
        $y['model']['id_penjahit'] = $row7['id_penjahit'];
        $y['model']['name'] = $row7['name'];
        $y['model']['price'] = $row7['price'];
        $y['model']['material'] = $row7['material'];
        $y['model']['stock'] = $row7['stock'];
        $y['model']['description'] = $row7['description'];
        $y['model']['category_id'] = $row7['category_id'];
        $y['model']['estimasi_selesai'] = $row7['estimasi_selesai'];
        $y['model']['image'] = $baseUrl."asset/upload/model/".$row7['image']."";
        $y['model']['created_at'] = $row7['created_at'];
        $y['model']['updated_at'] = $row7['updated_at'];
    }
   // menambahkan array mk kedalam $x['MK']
   array_push($x['details'], $y);
  } 

  // untuk menambah array setelah array yang terakhir
  array_push($transaksi, $x);
 }
 //mengubah data array menjadi data json
 $response = array(
    
    'success' => 1,
    'message' => 'Transaksi Berhasil',
    'transaksis' => $transaksi
);

 echo json_encode($response);
?>