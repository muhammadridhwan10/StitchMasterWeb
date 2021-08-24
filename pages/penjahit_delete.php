<?php
if(isset($_GET['id_penjahit'])){
	$id_penjahit=$_GET['id_penjahit'];
	$mysqli->query("DELETE FROM tbl_penjahit WHERE id_penjahit='$id_penjahit'");
	if($mysqli->affected_rows>0){
		echo "
		<script>
			alert('Penjahit berhasil dihapus!');
			document.location.href='?page=penjahit';
		</script>";
	}else{
		echo "
		<script>
		alert('Penjahit gagal dihapus!');
		</script>";
	}
}
?>
