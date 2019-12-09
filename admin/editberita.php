    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Berita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Halaman Edit Berita </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<?php
  $ambil = $koneksi->query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
  $pecah = $ambil->fetch_assoc();
?>

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
                      <br>
                      <img src="../admin/Gambar/Berita/<?php echo $pecah['Gambar']; ?>" width="250">   
                  </div>
                  <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" class="form-control" name="Gambar">   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Program" name="Judul" value="<?php echo $pecah['Judul']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ket</label>
                    <textarea class="form-control" name="Ket" id="editor" placeholder="Keterangan Program" rows="3"><?php echo $pecah['Ket']; ?></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button class="btn btn-primary" name="ubah">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </form>
              <?php
                  if(isset($_POST['ubah']))
                    {
                      $nama = $_FILES['Gambar']['name'];
                      $lokasifoto = $_FILES['Gambar']['tmp_name'];

                      //Jika data Dan Foto Dirubah
                      if (!empty($lokasifoto)) 
                      {
                        move_uploaded_file($lokasifoto, "../admin/Gambar/Berita/$nama");
                        $koneksi->query("UPDATE berita SET 
                                          Judul='$_POST[Judul]', Ket='$_POST[Ket]', Gambar='$nama'
                                        WHERE id_berita='$_GET[id]'");
                      }
                      else
                      {
                        $koneksi->query("UPDATE berita SET 
                                         Judul='$_POST[Judul]', Ket='$_POST[Ket]'
                                        WHERE id_berita='$_GET[id]'");

                      
                      }
                        echo "<script>alert('Data Program Berhasil Di Update');</script>";
                        echo "<script>location='indexadmin.php?halaman=berita';</script>";
                    }
              ?>
          </div>
        </div>  
      </div>
    </div>  
  </div>
</section>  