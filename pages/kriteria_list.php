<section class="content-header">
  <h1>
	Data Kriteria
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Kriteria</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	<a href="?page=kriteria&action=tambah">
		<button type="button" class="btn btn-primary btn-sm flat">
			<span class="glyphicon glyphicon-plus"></span> Tambah
		</button>
	</a>
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Kriteria</h3>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">No</th>
				<th>Kriteria</th>
				<th>Bobot</th>
				<th>Tipe</th>
				<th width="10%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result =$mysqli->query("SELECT a.* FROM tbl_kriteria a ORDER BY a.kriteria ASC");
			  if($result->num_rows>0){
			  $no=1;
			  while($row=$result->fetch_assoc()){?>
			  <tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row["kriteria"]; ?></td>
				<td><?php echo $row["bobot"]; ?></td>
				<td><?php echo ($row["tipe"]=='max') ? "Benefit" : "Cost"; ?></td>
				<td class="text-center">
					<div class="btn-group">
						<a href="?page=kriteria&action=edit&id_kriteria=<?=$row["id_kriteria"];?>">
							<button type="button" class="glyphicon glyphicon-pencil btn btn-sm btn-warning" title="Edit Kriteria"></button>
						</a>
						<a href="?page=kriteria&action=hapus&id_kriteria=<?=$row["id_kriteria"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');">
							<button  type="button" class="glyphicon glyphicon-trash btn btn-sm btn-danger" title="Hapus Kriteria"></button>
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