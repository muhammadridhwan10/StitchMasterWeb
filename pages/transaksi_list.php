<section class="content-header">
  <h1>
	Data Transaksi
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Transaksi</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Transaksi Pending</h3>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">Id</th>
				<th>User Id</th>
                <th>Total Item</th>
				<th>Total Harga</th>
				<th>Status</th>
				<th>Nama</th>
				<th>Detail ukuran</th>
				<th>Telepon</th>
				<th>Kode-Trx</th>
				<th>Bank</th>
                <th>No Antrian</th>
				<th width="12%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result = $mysqli->query("SELECT * FROM transaksis WHERE status = 'MENUNGGU'");
			  if($result->num_rows>0){
			  $no=1;
			  while($row=$result->fetch_assoc()){?>
			  <tr>
                <td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["user_id"]; ?></td>
                <td><?php echo $row["total_item"]; ?></td>
				<td><?php echo $row["total_harga"]; ?></td>
				<td><?php echo $row["status"]; ?></td>
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["detail_ukuran"]; ?></td>
				<td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["kode_trx"]; ?></td>
				<td><?php echo $row["bank"]; ?></td>
                <td><?php echo $row["no_antrian"]; ?></td>
				<td>
				<a href="?page=transaksi&action=batal&id=<?=$row["id"];?>">
				<button type ="button" class="btn btn btn-danger btn-xs">Batal</button>
						</a>
				/
				<a href="?page=transaksi&action=proses&id=<?=$row["id"];?>">
				<button type ="button" class="btn btn btn-success btn-xs">Proses</button>
				</a>
			    </td>
				<td class="text-center">
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



<section class="content">
  <div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Transaksi Selesai</h3>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">Id</th>
				<th>User Id</th>
                <th>Total Item</th>
				<th>Total Harga</th>
				<th>Status</th>
				<th>Nama</th>
				<th>Detail ukuran</th>
				<th>Telepon</th>
				<th>Kode-Trx</th>
				<th>Bank</th>
                <th>No Antrian</th>
				<th width="12%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result = $mysqli->query("SELECT * FROM `transaksis` WHERE status NOT LIKE '%MENUNGGU%'");
			  if($result->num_rows>0){
			  $no=1;
			  while($row=$result->fetch_assoc()){?>
			  <tr>
                <td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["user_id"]; ?></td>
                <td><?php echo $row["total_item"]; ?></td>
				<td><?php echo $row["total_harga"]; ?></td>
				<td><?php echo $row["status"]; ?></td>
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["detail_ukuran"]; ?></td>
				<td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["kode_trx"]; ?></td>
				<td><?php echo $row["bank"]; ?></td>
                <td><?php echo $row["no_antrian"]; ?></td>
				
				<td>
				<!-- <a href="?page=transaksi&action=batal&id=<?=$row["id"];?>">
				<button type ="button" class="btn btn btn-danger btn-xs">Batal</button>
						</a>
				/ -->
				<a href="?page=transaksi&action=selesai&id=<?=$row["id"];?>">
				<button type ="button" class="btn btn btn-success btn-xs">Selesai</button>
				</a>
				/
				<a href="pages/transaksi_cetak.php?id=<?=$row["id"];?>">
				<button type ="button" class="btn btn btn-primary btn-xs">
				<i class="fa fa-print"></i>  Cetak	
				</button>
				</a>
			    </td>
				<td class="text-center">
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