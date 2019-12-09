    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Isi Aduan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Halaman Edit Aduan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<?php
  $ambil = $koneksi->query("SELECT * FROM daftar_aduan WHERE id_daftaraduan='$_GET[id]'");
  $pecah = $ambil->fetch_assoc();
?>

<section class="content">    
  <div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Aduan</h3>
          </div>
          
          <div class="card-body">
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Program" name="Nama" value="<?php echo $pecah['Nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NPM</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Detail Program" name="NPM" value="<?php echo $pecah['NPM']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Detail Program" name="Email" value="<?php echo $pecah['Email']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Detail Program" name="Phone" value="<?php echo $pecah['Phone']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pesan</label>
                    <textarea class="form-control" rows="3" id="exampleInputEmail1" placeholder="Detail Program" name="Message"><?php echo $pecah['Message']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Respon Admin</label>
                    <textarea class="form-control" name="Respon" id="editor" placeholder="Keterangan Program" rows="3"></textarea>
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
                        $koneksi->query("UPDATE daftar_aduan SET 
                                        Nama='$_POST[Nama]', NPM='$_POST[NPM]', Email='$_POST[Email]', Phone='$_POST[Phone]', 
                                        Message='$_POST[Message]', Respon='$_POST[Respon]', Status='Direspon'
                                        WHERE id_daftaraduan='$_GET[id]'");
                        echo "<script>alert('Data Program Berhasil Di Update');</script>";
                        echo "<script>location='indexadmin.php?halaman=daftaraduan';</script>";
                    }
              ?>
          </div>
        </div>  
      </div>
    </div>  
  </div>
</section>  