<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
      <div class="row">
        <a href="indexadmin.php?halaman=registrasiuser" class="btn btn-primary"><i class="fas fa-plus"> Tambah Data User</i></a>
      </div>
    </div>

    <br>

<section class="content">    
  	<div class="row" id="">
    	<div class="col-md-12">
        	<div class="card">
	          	<div class="card-header">
	            	<h3 class="card-title">User</h3>
	          	</div>
	          	<div class="card-body">
	          		<table class="table table-bordered table-hover" id="example2">
	          			<thead>
	          				<tr>
	          					<th width="1">No</th>
	          					<th>User</th>
	          				</tr>
	          			</thead>
	          			<tbody>
		                  	<?php $nomor=1;?>
		                  	<?php $ambil = $koneksi->query("SELECT * FROM user "); ?>
		                  	<?php while($pecah=$ambil->fetch_assoc()) { ?>
	          				<tr>
	          					<td width="1"><?php echo $nomor; ?></td>
	          					<td><?php echo $pecah['username']; ?></td>
	          					<td>
			                      <a href="indexadmin.php?halaman=deleteuser&id=<?php echo $pecah['ID_User'];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
	          					</td>
	          				</tr>
	          				<?php $nomor++; ?>
	          				<?php } ?>
	          			</tbody>
	          			<tfoot>
	          				<!-- <tr>
							  	<th>No</th>
	          					<th>Gambar</th>
	          					<th>Judul Portofolio</th>
	          					<th>Ket Portofolio</th>
	          				</tr> -->
	          			</tfoot>
	          		</table>
	        	</div>
          	</div>
        </div>  
	</div>
</section>            	