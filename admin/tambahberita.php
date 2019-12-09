<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Berita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Halaman Tambah Berita</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">    
  <div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Berita</h3>
          </div>
          
          <div class="card-body">
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" class="form-control" name="Gambar">   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Berita" name="Judul">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ket</label>
                    <textarea class="form-control" name="Ket" id="editor" placeholder="Keterangan Program" rows="3"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="save">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </form>
              <?php
                  if(isset($_POST['save']))
                    {
                      $nama     = $_FILES['Gambar']['name'];
                      $lokasi   = $_FILES['Gambar']['tmp_name'];
                      move_uploaded_file($lokasi, "../admin/Gambar/Berita/".$nama);
                      $koneksi->query("INSERT INTO berita 
                              (Gambar,Judul,Ket) VALUES ('$nama','$_POST[Judul]','$_POST[Ket]')");

                      echo "<script>alert('Data Program Berhasil Di Tambah');</script>";
                      echo "<script>location='indexadmin.php?halaman=berita';</script>";
                    }
              ?>
          </div>
        </div>  
      </div>
    </div>  
  </div>
</section>  