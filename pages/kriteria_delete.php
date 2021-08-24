<?php
if(isset($_GET['id_kriteria'])){
	$id_kriteria=$_GET['id_kriteria'];
	$mysqli->query("DELETE FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
	if($mysqli->affected_rows>0){
		echo "
		<script>
			alert('Kriteria berhasil dihapus!');
			document.location.href='?page=kriteria';
		</script>";
	}else{
		echo "
		<script>
		alert('Kriteria gagal dihapus!');
		</script>";
	}
}
?>
