<?php
$id_admin	=$_SESSION['id_admin'];
$result		=$mysqli->query("SELECT * FROM tbl_admin WHERE id_admin='$id_admin'");
$row		=$result->fetch_object();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id_admin	= $_SESSION['id_admin'];
	$nama 		= htmlspecialchars($_POST['nama']);
	$telepon 	= htmlspecialchars($_POST['telepon']);
	$email 		= htmlspecialchars($_POST['email']);
	$username 	= htmlspecialchars($_POST['username']);
	$password 	= htmlspecialchars($_POST['newpassword']);
	if(isset($_FILES['foto']['name'])){
		$rand 		= rand();
		$ekstensi 	= array('png','jpg','jpeg','gif');
		$filename 	= $_FILES['foto']['name'];
		$ukuran 	= $_FILES['foto']['size'];
		$ext 		= pathinfo($filename, PATHINFO_EXTENSION);
		if(!in_array($ext,$ekstensi) ) {
			echo"<script>alert('Admin gagal diupdate ekstensi tidak di izinkan!');</script>";
		}else{
			if($ukuran < 1044070){		
				$foto = $rand.'_'.$filename;
				move_uploaded_file($_FILES['foto']['tmp_name'], 'asset/upload/admin/'.$foto);
				if($password!=''){
					$mysqli->query("UPDATE tbl_admin SET nama='$nama',telepon='$telepon',email='$email',username='$username',password='$password',foto='$foto' WHERE id_admin='$id_admin'");
					if($mysqli->affected_rows>0){
						echo"<script>alert('profile berhasil diupdate !');</script>";
					} else{
						echo"<script>alert('profile gagal diupdate !');</script>";
					}
				}else{
					$mysqli->query("UPDATE tbl_admin SET nama='$nama',telepon='$telepon',email='$email',username='$username',foto='$foto' WHERE id_admin='$id_admin'");
					if($mysqli->affected_rows>0){
						echo"<script>alert('profile berhasil diupdate !');document.location.href = '?page=admin';</script>";
					} else{
						echo"<script>alert('profile gagal diupdate !');</script>";
					}
				}
			}else{
				echo"<script>alert('profile gagal diupdate !');</script>";
			}
		}
	}else{
		if($password!=''){
			$mysqli->query("UPDATE tbl_admin SET nama='$nama',telepon='$telepon',email='$email',username='$username',password='$password' WHERE id_admin='$id_admin'");
			if($mysqli->affected_rows>0){
				echo"<script>alert('profile berhasil diupdate !');document.location.href = '?page=admin';</script>";
			} else{
				echo"<script>alert('profile gagal diupdate !');</script>";
			}
		}else{
			$mysqli->query("UPDATE tbl_admin SET nama='$nama',telepon='$telepon',email='$email',username='$username' WHERE id_admin='$id_admin'");
			if($mysqli->affected_rows>0){
				echo"<script>alert('profile berhasil diupdate !');document.location.href = '?page=admin';</script>";
			} else{
				echo"<script>alert('profile gagal diupdate !');</script>";
			}
		}
	}
}
?>
<section class="content-header">
  <h1>
	Edit Profile
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Setting</a></li>
	<li class="active">Profile</a></li>
  </ol>
</section>
<form id="frm" class="form-horizontal" method="post" enctype="multipart/form-data">
<section class="content">
  <div class="row">
	<div class="col-md-3">
		<div class="box box-info">
			<div class="box-header with-border">
			FOTO
			</div>
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="asset/upload/admin/<?php echo $row->foto; ?>" alt="profile picture">
				<h3 class="profile-username text-center"><?php echo $row->username;?></h3>
			</div>
			<input class="btn btn-primary btn-block" type="file" name="userfile">
		</div>
	</div>
  <div class="col-md-9">
	  <div class="box box-info">
		<div class="box-header with-border">
		PENGATURAN AKUN
		</div>
		  <div class="box-body">
			
			<div class="form-group">
			  <label for="nama" class="col-sm-2 control-label">Nama</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $row->nama;?>" required>
			  </div>
			</div>
			<div class="form-group">
			  <label for="telepon" class="col-sm-2 control-label">Telepon</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="<?php echo $row->telepon;?>" required>
			  </div>
			</div>
			<div class="form-group">
			  <label for="telepon" class="col-sm-2 control-label">Email</label>
			  <div class="col-sm-10">
				<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row->email;?>" required>
			  </div>
			</div>
			<div class="form-group">
			  <label for="telepon" class="col-sm-2 control-label">Username</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $row->username;?>" required>
			  </div>
			</div>
			<div class="form-group">
			  <label for="password" class="col-sm-2 control-label">Password</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="newpassword" name="newpassword" placeholder="Ganti Password ?">
			  </div>
			</div>
			<div class="form-group">
			  <label for="password" class="col-sm-2 control-label"></label>
			  <div class="col-sm-5">
				<button type="submit" id="btn-update" class="btn btn-md btn-primary">
				<i class="ace-icon fa fa-save"></i> Update
				</button>
				<button type="button" class="btn btn-md btn-danger">
				<i class="ace-icon fa fa-ban"></i> Reset
				</button>
			  </div>
			</div>
		  </div>               
	  </div>
	</div>
  </div>
</section>
</form>