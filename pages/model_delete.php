<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$mysqli->query("DELETE FROM models WHERE id ='$id'");
	if($mysqli->affected_rows>0){
		echo "
		<script>
			alert('Models berhasil dihapus!');
			document.location.href='?page=model';
		</script>";
	}else{
		echo "
		<script>
		alert('Moedels gagal dihapus!');
		</script>";
	}
}
?>