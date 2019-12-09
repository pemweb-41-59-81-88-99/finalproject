<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Aduan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Aduan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- <div class="container">
      <div class="row">
        <a href="indexadmin.php?halaman=tambahgallery" class="btn btn-primary"><i class="fas fa-plus"> Tambah Data</i></a>
      </div>
    </div> -->

    <br>

<section class="content">    
  	<div class="row" id="">
    	<div class="col-md-12">
        	<div class="card">
	          	<div class="card-header">
	            	<h3 class="card-title">Daftar Aduan</h3>
	          	</div>
	          	<div class="card-body">
	          		<table class="table table-bordered table-hover" id="example2">
	          			<thead>
	          				<tr>
	          					<th width="1">No</th>
	          					<th width="1">Nama</th>
	          					<th width="1">NPM</th>
                      <th width="1">Email</th>
                      <th width="1">Nomor HP</th>
                      <th>Pesan</th>
                      <th width="1">Status</th>
                      <th width="11%"></th>
	          				</tr>
	          			</thead>
	          			<tbody>
		                  	<?php $nomor=1;?>
		                  	<?php $ambil = $koneksi->query("SELECT * FROM daftar_aduan "); ?>
		                  	<?php while($pecah=$ambil->fetch_assoc()) { ?>
	          				<tr>
	          					<td><?php echo $nomor; ?></td>
	          					<td><?php echo $pecah['Nama']; ?></td>
                      <td><?php echo $pecah['NPM']; ?></td>
                      <td><?php echo $pecah['Email']; ?></td>
                      <td><?php echo $pecah['Phone']; ?></td>
                      <td><?php echo $pecah['Message'];?></td>
                      <td><?php echo $pecah['Status'];?></td>
                      <td>
                            <a href="indexadmin.php?halaman=editdaftaraduan&id=<?php echo $pecah['id_daftaraduan'];?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="indexadmin.php?halaman=deletedaftaraduan&id=<?php echo $pecah['id_daftaraduan'];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
	          				</tr>
	          				<?php $nomor++; ?>
	          				<?php } ?>
	          			</tbody>
	          		</table>
	        	</div>
          	</div>
        </div>  
	</div>
</section>            	