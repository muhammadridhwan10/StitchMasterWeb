<?php
$id_penjahit=$_GET["id_penjahit"];
$result		=$mysqli->query("SELECT * FROM tbl_penjahit WHERE id_penjahit='$id_penjahit'");
$row		=$result->fetch_object();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id_penjahit= htmlspecialchars($_POST['id_penjahit']);
	$nama 		= htmlspecialchars($_POST['nama']);
	$alamat 	= htmlspecialchars($_POST['alamat']);
	$telepon 	= htmlspecialchars($_POST['telepon']);
	$email 		= htmlspecialchars($_POST['email']);
	$latitude 	= htmlspecialchars($_POST['latitude']);
	$longitude 	= htmlspecialchars($_POST['longitude']);
	if($_FILES['foto']['name']!=''){
		$rand 		= rand();
		$ekstensi 	= array('png','jpg','jpeg','gif');
		$filename 	= $_FILES['foto']['name'];
		$ukuran 	= $_FILES['foto']['size'];
		$ext 		= pathinfo($filename, PATHINFO_EXTENSION);
		if(in_array($ext,$ekstensi) ) {
			if($ukuran < 1044070){		
				$foto = $rand.'_'.$filename;
				move_uploaded_file($_FILES['foto']['tmp_name'], 'asset/upload/penjahit/'.$foto);
				$mysqli->query("UPDATE tbl_penjahit SET nama='$nama',alamat='$alamat',telepon='$telepon',email='$email',latitude='$latitude',longitude='$longitude',foto='$foto' WHERE id_penjahit='$id_penjahit'");
				echo"<script>alert('penjahit berhasil diupdate !');document.location.href = '?page=penjahit';</script>";
			}else{
				echo"<script>alert('Penjahit gagal diupdate!');</script>";
			}
		}else{
			echo"<script>alert('Penjahit gagal diupdate ekstensi tidak di izinkan!');</script>";
		}
	}else{
		$mysqli->query("UPDATE tbl_penjahit SET nama='$nama',alamat='$alamat',telepon='$telepon',email='$email',latitude='$latitude',longitude='$longitude' WHERE id_penjahit='$id_penjahit'");
		echo"<script>alert('penjahit berhasil diupdate!');document.location.href = '?page=penjahit';</script>";
	}
}
 ?>
<section class="content-header">
  <h1>
	Edit Penjahit
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Penjahit</a></li>
	<li class="active">Edit</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="?page=penjahit">
		<span class="glyphicon fa fa-mail-reply"></span> <b>Kembali</b>
	</a> 
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
  </div>
</div>
<div class="box-body">
  <div class="row">
	<div class="col-md-12">
	  <form id="frm" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="box-body">
			<div class="form-group">
				<label class="control-label col-sm-2" for="nama">Nama Penjahit</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nama" name="nama"  value="<?php echo $row->nama;?>" placeholder="Nama" required>
				  <input type="hidden" id="id_penjahit" name="id_penjahit" value="<?php echo $row->id_penjahit; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="alamat">Alamat</label>
				<div class="col-sm-8">
				  <textarea type="text" class="form-control" rows="5" id="alamat" name="alamat" placeholder="Alamat" required><?php echo $row->alamat;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="telepon">Telepon</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $row->telepon;?>" placeholder="Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="email" name="email" value="<?php echo $row->email;?>" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="latitude">Latitude</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $row->latitude;?>" placeholder="Latitude" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="longitude">Longitude</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $row->longitude;?>" placeholder="Longitude" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="longitude">Ganti Foto?</label>
				<div class="col-sm-8">
				  <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Update
				  </button>
				  <button type="reset" class="btn btn-md btn-danger">
					<i class="ace-icon fa fa-ban"></i> Reset
				  </button>
				</div>
			</div>
		</div>
	  </form>
	</div>
  </div>
</div>
</div>
</section>