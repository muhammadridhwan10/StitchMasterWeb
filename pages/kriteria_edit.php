<?php
$id_kriteria=$_GET["id_kriteria"];
$result=$mysqli->query("SELECT * FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
$row=$result->fetch_object();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id_kriteria= htmlspecialchars($_POST['id_kriteria']);
	$kriteria	= htmlspecialchars($_POST['kriteria']);
	$bobot 		= htmlspecialchars($_POST['bobot']);
	$tipe 		= htmlspecialchars($_POST['tipe']);
	$mysqli->query("UPDATE tbl_kriteria SET kriteria='$kriteria',bobot='$bobot' WHERE id_kriteria='$id_kriteria'");
	echo"<script>alert('kriteria berhasil diupdate!');document.location.href = '?page=kriteria';</script>";
}
 ?>
<section class="content-header">
  <h1>
	Edit Kriteria
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Kriteria</a></li>
	<li class="active">Edit</a></li>
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
				  <input type="text" class="form-control" id="kriteria" name="kriteria" value="<?php echo $row->kriteria; ?>" placeholder="Kriteria" required>
				  <input type="hidden" id="id_kriteria" name="id_kriteria" value="<?php echo $row->id_kriteria; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="bobot">Bobot</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="bobot" name="bobot" value="<?php echo $row->bobot; ?>" placeholder="Bobot" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="tipe">Benefit/Cost</label>
				<div class="col-sm-8">
				  <select name="tipe" id="tipe" class="form-control" required>
					<?php if($row->tipe=='max'){ ?>
						<option value="max" selected>Benefit</option>
						<option value="min">Cost</option>
					<?php } else{ ?>
						<option value="max">Benefit</option>
						<option value="min" selected>Cost</option>
					<?php } ?>
					</select>
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