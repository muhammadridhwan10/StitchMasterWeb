<section class="content-header">
  <h1>
	Metode SMART
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">SMART</a></li>
	<li class="active">Hasil</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Hasil Perankingan</h3>
		  <div class="box-tools pull-right">
			<a class="btn btn-primary btn-md" href="pages/proses.php">
				<span class="glyphicon fa fa-refresh"></span> <b>Proses</b>
			</a>
		  </div>
		</div>
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
				  <tr>
					<th width="5%">No</th>
					<th>Foto</th>
					<th>Penjahit</th>
					<th>Model</th>
					<th class="text-right">Harga</th>
					<th width="10%" class="text-center" >Rating</th>
				  </tr>
				</thead>
				<tbody>
					<?php
					$result=$mysqli->query("SELECT a.*,b.nama
											FROM models a
											LEFT JOIN tbl_penjahit b ON b.id_penjahit=a.id_penjahit
											ORDER BY a.rating DESC");
					if($result->num_rows>0){
					  $no=1;
					  while($row=$result->fetch_object()){
						  echo '<tr>';
							echo '<td>'.$no.'</td>';
							echo '<td class="text-center" width="5%"><img src="asset/upload/model/'.$row->image.'" class="img-circle" width="100%"></td>';
							echo '<td>'.$row->nama.'</td>';
							echo '<td>'.$row->name.'</td>';
							echo '<td class="text-right">Rp '.number_format($row->price).'</td>';
							echo '<td class="text-center">'.$row->rating.'</td>';
							echo '</tr>';
							$no++;
					  }
					}
					?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
  </div>
</section>
<script type="text/javascript">
  $(function () {
	$("#example1").dataTable();
  });
</script>