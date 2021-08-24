<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name 		= htmlspecialchars($_POST['name']);
	$email 	    = htmlspecialchars($_POST['email']);
	$phone 		= htmlspecialchars($_POST['phone']);
	$password 	= md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
	$mysqli->query("INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$password')");
	if($mysqli->affected_rows>0){
	  echo"
	  <script>
		alert('User berhasil ditambahkan!');
		document.location.href = '?page=user';
	  </script>";
	}else{
		echo"
		<script>
		alert('User gagal ditambahkan!');
		</script>";
	}
}
?>
<section class="content-header">
  <h1>
	Tambah User
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">User</a></li>
	<li class="active">Add</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="?page=user">
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
				<label class="control-label col-sm-2" for="name">Nama</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
				</div>
			</div>
            <div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="phone">Phone</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Password</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Simpan
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