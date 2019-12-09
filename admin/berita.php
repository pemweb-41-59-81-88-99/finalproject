    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Berita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Halaman Berita</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
      <div class="row">
        <a href="indexadmin.php?halaman=tambahberita" class="btn btn-primary"><i class="fas fa-plus"> Tambah Data</i></a>
      </div>
    </div>

    <br>

<section class="content">    
  	<div class="row" id="">
    	<div class="col-md-12">
        	<div class="card">
	          	<div class="card-header">
	            	<h3 class="card-title">Berita</h3>
	          	</div>
	          	<div class="card-body">
	          		<table class="table table-bordered table-hover" id="example2">
	          			<thead>
	          				<tr>
	          					<th width="1">No</th>
	          					<th width="1">Gambar</th>
	          					<th>Judul Berita</th>
	          					<th>Keterangan Berita</th>
	          					<th width="11%"></th>
	          				</tr>
	          			</thead>
	          			<tbody>
		                  	<?php $nomor=1;?>
		                  	<?php $ambil = $koneksi->query("SELECT * FROM berita "); ?>
		                  	<?php while($pecah=$ambil->fetch_assoc()) { ?>
	          				<tr>
	          					<td><?php echo $nomor; ?></td>
	          					<td><img src="Gambar/Berita/<?php echo $pecah['Gambar'];?>" width="150"></td>
	          					<td><?php echo $pecah['Judul']; ?></td>
	          					<td><?php echo $pecah['Ket']; ?></td>
	          					<td>
			                      <a href="indexadmin.php?halaman=editberita&id=<?php echo $pecah['id_berita'];?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
			                      <a href="indexadmin.php?halaman=deleteberita&id=<?php echo $pecah['id_berita'];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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