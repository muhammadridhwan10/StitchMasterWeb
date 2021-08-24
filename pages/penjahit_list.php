<section class="content-header">
  <h1>
	Data Penjahit
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Penjahit</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	<a href="?page=penjahit&action=tambah">
		<button type="button" class="btn btn-primary btn-sm flat">
			<span class="glyphicon glyphicon-plus"></span> Tambah
		</button>
	</a>
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Penjahit</h3>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">No</th>
				<th>Foto</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th width="12%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result =$mysqli->query("SELECT a.* FROM tbl_penjahit a ORDER BY a.id_penjahit ASC");
			  if($result->num_rows>0){
			  $no=1;
			  while($row=$result->fetch_assoc()){?>
			  <tr>
				<td><?php echo $no;?></td>
				<td class="text-center" width="5%"><img src="asset/upload/penjahit/<?php echo $row["foto"]; ?>" class="img-circle" width="100%"></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["alamat"]; ?></td>
				<td><?php echo $row["telepon"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["latitude"]; ?></td>
				<td><?php echo $row["longitude"]; ?></td>
				<td class="text-center">
					<div class="btn-group">
						<a href="?page=penjahit&action=edit&id_penjahit=<?=$row["id_penjahit"];?>">
							<button type="button" class="glyphicon glyphicon-pencil btn btn-sm btn-warning" title="Edit Penjahit"></button>
						</a>
						<a href="?page=penjahit&action=hapus&id_penjahit=<?=$row["id_penjahit"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');">
							<button  type="button" class="glyphicon glyphicon-trash btn btn-sm btn-danger" title="Hapus Penjahit"></button>
						</a>
					</div>
				</td>
			  </tr>
			  <?php $no++; ?>
			  <?php } ?>
			  <?php } ?>
			</tbody>
				   
			<tfoot>
			</tfoot>
		  </table>

		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
  </div><!-- /.row -->
</section>
<script type="text/javascript">
  $(function () {
	$("#example1").dataTable();
  });
</script>