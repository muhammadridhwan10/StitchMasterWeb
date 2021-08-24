<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_penjahit    = htmlspecialchars($_POST['id_penjahit']);
	$name		    = htmlspecialchars($_POST['name']);
	$price  	    = htmlspecialchars($_POST['price']);
	$material 	    = htmlspecialchars($_POST['material']);
	$stock 		    = htmlspecialchars($_POST['stock']);
	$description 	= htmlspecialchars($_POST['description']);
	$estimasi_selesai 	= htmlspecialchars($_POST['estimasi_selesai']);
	$category_id 	= htmlspecialchars($_POST['category_id']);
	$created_at     = date('Y-m-d H:i:s');
	$updated_at     = date('Y-m-d H:i:s');
	
	$rand 		= rand();
	$ekstensi 	= array('png','jpg','jpeg','gif');
	$filename 	= $_FILES['image']['name'];
	$ukuran 	= $_FILES['image']['size'];
	$ext 		= pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$ekstensi) ) {
		echo"<script>alert('Models gagal ditambahkan ekstensi tidak di izinkan!');</script>";
	}else{
		if($ukuran < 1044070){		
			$image = $rand.'_'.$filename;
			move_uploaded_file($_FILES['image']['tmp_name'], 'asset/upload/model/'.$image);
			$mysqli->query("INSERT INTO models(id_penjahit, name, price, material, stock, description, estimasi_selesai, category_id, image, created_at, updated_at) VALUES('$id_penjahit','$name','$price','$material','$stock','$description','$estimasi_selesai','$category_id','$image','$created_at','$updated_at')");
			if($mysqli->affected_rows>0){
				echo"<script>alert('Models berhasil ditambahkan!');document.location.href = '?page=model';</script>";
			}else{
				echo"<script>alert('Models gagal ditambahkan!');</script>";
			}
		}else{
			echo"<script>alert('Models gagal ditambahkan!');</script>";
		}
	}
}
?>
<section class="content-header">
  <h1>
	Tambah Models
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Models</a></li>
	<li class="active">Add</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="?page=model">
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
                <label class="col-sm-2 control-label" for="id_penjahit">Penjahit</label>
                <div class="col-sm-8">
                  <select class="chosen-select" id="id_penjahit" name="id_penjahit" data-placeholder="-- Pilih Penjahit --" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                     $query = mysqli_query($mysqli, "SELECT id_penjahit,nama FROM tbl_penjahit WHERE id_penjahit ='$id_penjahit'")
                     or die('Ada kesalahan pada query tampil data barang: '.mysqli_error($mysqli));

                      $query_penjahit = mysqli_query($mysqli, "SELECT id_penjahit, nama FROM tbl_penjahit ORDER BY nama ASC")
                                                            or die('Ada kesalahan pada query tampil barang: '.mysqli_error($mysqli));
                      while ($data_penjahit = mysqli_fetch_assoc($query_penjahit)) {
                        echo"<option value=\"$data_penjahit[id_penjahit]\"> $data_penjahit[id_penjahit] | $data_penjahit[nama] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="name">Nama Models</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Model" required>
				</div>
			</div>
            <div class="form-group">
				<label class="control-label col-sm-2" for="price">Price</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
				</div>
			</div>
            <div class="form-group">
				<label class="control-label col-sm-2" for="material">Material</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="material" name="material" placeholder="Material" required>
				</div>
			</div>
            <div class="form-group">
				<label class="control-label col-sm-2" for="stock">Stock</label>
				<div class="col-sm-8">
                <select class="form-control" name="stock">
                          <option value="Tersedia">Tersedia</option>
                          <option value="Kosong">Kosong</option>
                        </select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="description">Description</label>
				<div class="col-sm-8">
				  <textarea type="text" class="form-control" rows="5" id="description" name="description" placeholder="Description" required></textarea>
				</div>
            </div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="estimasi_selesai">Estimasi Selesai</label>
				<div class="col-sm-8">
				  <textarea type="text" class="form-control" id="estimasi_selesai" name="estimasi_selesai" placeholder="Estimasi Selesai" required></textarea>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-sm-2" for="category_id">Category_id</label>
				<div class="col-sm-8">
                <select class="form-control" name="category_id">
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="image">Image</label>
				<div class="col-sm-8">
				  <input type="file" class="form-control" id="image" name="image" placeholder="Image" required>
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