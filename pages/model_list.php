<section class="content-header">
  <h1>
	Data Models
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Models</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	<a href="?page=model&action=tambah">
		<button type="button" class="btn btn-primary btn-sm flat">
			<span class="glyphicon glyphicon-plus"></span> Tambah
		</button>
	</a>
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Models</h3>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">Id</th>
				<th>Image</th>
                <th>id_penjahit</th>
				<th>Nama</th>
				<th>Price</th>
				<th>Material</th>
				<th>Stock</th>
				<th>Description</th>
				<th>Estimasi Selesai</th>
				<th>Category_id</th>
				<th width="12%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result = $mysqli->query("SELECT a.* FROM models a ORDER BY a.id_penjahit ASC");
			  if($result->num_rows>0){
			  $no=1;
			  while($row=$result->fetch_assoc()){?>
			  <tr>
                <td><?php echo $row["id"]; ?></td>
				<td class="text-center" width="5%"><img src="asset/upload/model/<?php echo $row["image"]; ?>" class="img-circle" width="100%"></td>
				<td><?php echo $row["id_penjahit"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["price"]; ?></td>
				<td><?php echo $row["material"]; ?></td>
				<td><?php echo $row["stock"]; ?></td>
				<td><?php echo $row["description"]; ?></td>
				<td><?php echo $row["estimasi_selesai"]; ?></td>
				<td><?php echo $row["category_id"]; ?></td>
				<td class="text-center">
					<div class="btn-group">
						<a href="?page=model&action=edit&id=<?=$row["id"];?>">
							<button type="button" class="glyphicon glyphicon-pencil btn btn-sm btn-warning" title="Edit Models"></button>
						</a>
						<a href="?page=model&action=hapus&id=<?=$row["id"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');">
							<button  type="button" class="glyphicon glyphicon-trash btn btn-sm btn-danger" title="Hapus Models"></button>
						</a>
					</div>
				</td>
			  </tr>
			  <?php $id++; ?>
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