<!-- <?php
$id=$_GET["id"];
$result=$mysqli->query("SELECT * FROM users WHERE id='$id'");
$row=$result->fetch_object();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id	= htmlspecialchars($_POST['id']);
	$name 		= htmlspecialchars($_POST['name']);
	$email 	    = htmlspecialchars($_POST['email']);
	$phone 		= htmlspecialchars($_POST['phone']);
	$password 	= md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
	if($password!=''){
		$mysqli->query("UPDATE users SET name='$name',email='$email',phone='$phone' WHERE id='$id'");
	}else{
		$mysqli->query("UPDATE users SET name='$name',email='$email',phone='$phone',password='$password' WHERE id='$id'");
	}
	echo "<script>alert('user berhasil diupdate!');document.location.href = '?page=user';</script>";
}
 ?>
<section class="content-header">
  <h1>
	Edit User
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">User</a></li>
	<li class="active">Edit</a></li>
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
				  <input type="text" class="form-control" id="name" name="name" value="<?php echo $row->name;?>" placeholder="Nama" required>
				  <input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>">
				</div>
			</div>
            <div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="email" name="email" value="<?php echo $row->email;?>" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="phone">Telepon</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->phone;?>"  placeholder="Phone" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Ganti Password ?</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="password" name="password" placeholder="Password">
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
</section> -->