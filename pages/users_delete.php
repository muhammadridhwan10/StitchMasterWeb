<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$mysqli->query("DELETE FROM users WHERE id='$id'");
	if($mysqli->affected_rows>0){
		echo "
		<script>
			alert('User berhasil dihapus!');
			document.location.href='?page=user';
		</script>";
	}else{
		echo "
		<script>
		alert('User gagal dihapus!');
		</script>";
	}
}
?>
