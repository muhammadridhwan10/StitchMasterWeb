<?php
include '../koneksi.php';
$result=$mysqli->query("SELECT a.id_kriteria,b.models_id,(sum(a.nilai*2)/count(b.models_id)) as nilaiavg
						FROM tbl_rating_detail a
						LEFT JOIN transaksi_details b ON b.id=a.id_transaksi_detail
						GROUP BY a.id_kriteria,b.models_id
						ORDER BY a.id_kriteria,b.models_id");
if($result->num_rows>0){						
	while($row=$result->fetch_array()){
		$resultCek=$mysqli->query("SELECT * FROM tbl_rating WHERE id_kriteria='".$row['id_kriteria']."' AND id_models='".$row['models_id']."'");
		if($resultCek->num_rows>0){
			$mysqli->query("UPDATE tbl_rating set nilai='".$row['nilaiavg']."' WHERE id_models='".$row['models_id']."' AND id_kriteria='".$row['id_kriteria']."'");
		}else{
			$mysqli->query("INSERT INTO tbl_rating(id_models,id_kriteria,nilai) VALUES('".$row['models_id']."','".$row['id_kriteria']."','".$row['nilaiavg']."')");
		}
	}
}

//-- query untuk mendapatkan semua data kriteria di tabel smt_kriteria
$result = $mysqli->query("SELECT * FROM tbl_kriteria");
//-- menyiapkan variable penampung berupa array
$kriteria=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
while ($row = $result->fetch_assoc()) {
	$kriteria[$row['id_kriteria']]=array($row['kriteria'],$row['bobot'],$row['tipe']);
}
//-- query untuk mendapatkan semua data kriteria di tabel kriteria
$sql = '';
$result = $mysqli->query("SELECT a.id as id_models,a.name FROM models a WHERE a.id IN(SELECT DiSTINCT(id_models) as id FROM tbl_rating)");
//-- menyiapkan variable penampung berupa array
$alternatif=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
while($row=$result->fetch_assoc()) {
	$alternatif[$row['id_models']]=$row['name'];
}
//-- query untuk mendapatkan semua data sample penilaian di tabel smt_data
$sql = '';
$result = $mysqli->query("SELECT * FROM tbl_rating ORDER BY id_models,id_kriteria");
//-- menyiapkan variable penampung berupa array
$sample=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
while($row=$result->fetch_assoc()) {
	//-- jika array $sample[$row['id_models']] belum ada maka buat baru
	//-- $row['id_models'] adalah id alternatif
	if (!isset($sample[$row['id_models']])) {
		$sample[$row['id_models']] = array();
	}
	$sample[$row['id_models']][$row['id_kriteria']] = $row['nilai'];
}

//-- inisialisasi variabel array bobot
$bobot=array();
foreach($kriteria as $k=>$vk){
	$bobot[$k]=$vk[1];
}

//-- menghitung nilai total bobot
$jml_bobot=array_sum($bobot);
//-- inisialisasi variabel array w (bobot ternormalisasi)
$w=array();
//-- normalisasi bobot
foreach($bobot as $k=>$b){
	$w[$k]=$b/$jml_bobot;
}
//-- inisialisasi variabel array tranpose_d untuk menyimpan data tranpose dari data sample
$tranpose_d=array();
foreach($alternatif as $a=>$v){
	foreach($kriteria as $k=>$v_k){
		if(!isset($tranpose_d[$k]))$tranpose_d[$k]=array();
		$tranpose_d[$k][$a]=$sample[$a][$k];
	}
}
//-- inisialisasi variabel array c_max dan c_min 
$c_max=array();
$c_min=array();
//-- mencari nilai max dan min utk tiap-tiap kriteria
foreach($kriteria as $k=>$v){
	$c_max[$k]=max($tranpose_d[$k]);
	$c_min[$k]=min($tranpose_d[$k]);
}
//-- inisialisasi variabel array U
$U=array();
//-- menghitung nilai utility utk masing-masing alternatif dan kriteria
foreach($kriteria as $k=>$v){
	foreach($alternatif as $a=>$a_v){
		if(!isset($U[$a])) $U[$a]=array();
		if($kriteria[$k]['tipe']=='max'){
			//-- perhitungan nilai utility untuk benefit criteria
			$U[$a][$k]=($sample[$a][$k]-$c_min[$k])/($c_max[$k]-$c_min[$k]);
		}else{
			//-- perhitungan nilai utility untuk cost criteria
			$U[$a][$k]=($c_max[$k]-$sample[$a][$k])/($c_max[$k]-$c_min[$k]);
		}
	}
}
//-- inisialisasi variabel array V
$V=array();
//-- melakukan iterasi utk setiap alternatif 
foreach($U as $a=>$a_u){
	$V[$a]=0;
	//-- perhitungan nilai Preferensi V untuk tiap-tiap kriteria
	foreach($a_u as $k=>$u){
		$V[$a]+=$u*$w[$k];
	}
}			
//--mengurutkan data secara descending dengan tetap mempertahankan key/index array-nya 
arsort($V);
//-- mendapatkan key/index item array yang pertama 
$index=key($V);
foreach($V as $key=>$val){
	$val=round($val,3);
	//$val=$val*1000;
	$mysqli->query("UPDATE models set rating='".$val."' WHERE id='".$key."'");
}

echo"
<script language='JavaScript'>
	alert('Proses berhasil !');
	document.location='..?page=smart';
</script>";

?>