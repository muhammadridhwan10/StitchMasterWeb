<section class="content-header">
  <h1>
	Data User
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">User</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	<a href="?page=user&action=tambah">
		<button type="button" class="btn btn-primary btn-sm flat">
			<span class="glyphicon glyphicon-plus"></span> Tambah
		</button>
	</a>
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data User</h3>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">Id</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Telepon</th>
				<th width="10%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result =$mysqli->query("SELECT a.* FROM users a ORDER BY a.id ASC");
			  if($result->num_rows>0){
			  while($row=$result->fetch_assoc()){?>
			  <tr>
              <td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["phone"]; ?></td>
				<td class="text-center">
					<div class="btn-group">
						<a href="?page=user&action=hapus&id=<?=$row["id"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');">
							<button  type="button" class="glyphicon glyphicon-trash btn btn-sm btn-danger" title="Hapus Admin"></button>
						</a>
					</div>
				</td>
			  </tr>
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