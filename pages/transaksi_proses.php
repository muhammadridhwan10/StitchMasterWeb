<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$mysqli->query("UPDATE transaksis SET status ='PROSES'
    WHERE id='$id'");
	if($mysqli->affected_rows>0){
		echo "
		<script>
			alert('Transaksi berhasil diproses!');
			document.location.href='?page=transaksi';
		</script>";
	}else{
		echo "
		<script>
		alert('Transaksi gagal diproses!');
		</script>";
	}

	$mData = [
		'title' => "Pemberitahuan",
		'body' => "Pesanan Sedang Diproses"
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

}
?>