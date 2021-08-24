<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$kriteria 	= htmlspecialchars($_POST['kriteria']);
	$bobot 		= htmlspecialchars($_POST['bobot']);
	$mysqli->query("INSERT INTO tbl_kriteria(kriteria,bobot) VALUES('$kriteria','$bobot')");
	if($mysqli->affected_rows>0){
	  echo"
	  <script>
		alert('Kriteria berhasil ditambahkan!');
		document.location.href = '?page=kriteria';
	  </script>";
	}else{
		echo"
		<script>
		alert('Kriteria gagal ditambahkan!');
		</script>";
	}
}
?>
<section class="content-header">
  <h1>
	Tambah Kriteria
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Kriteria</a></li>
	<li class="active">Add</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="?page=kriteria">
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
				<label class="control-label col-sm-2" for="kriteria">Kriteria</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Kriteria" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="bobot">Bobot</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Bobot" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="tipe">Benefit/Cost</label>
				<div class="col-sm-8">
				  <select name="tipe" id="tipe" class="form-control" required>
						<option value="max">Benefit</option>
						<option value="min">Cost</option>
					</select>
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