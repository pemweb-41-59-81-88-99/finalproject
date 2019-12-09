<?php
	include('koneksi.php');
	$perintah="select * from jenis_aduan order by id_jenis_aduan ASC";
	$perintah2="select * from penyampaian order by id_penyampaian ASC";
	$cek=mysqli_query($koneksi,$perintah);
	$cek2=mysqli_query($koneksi,$perintah2);

	// membaca kode barang terbesar
	$query = "SELECT max(nomor_aduan) as maxID FROM daftar_aduan";
	$hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
	$kode = $data['maxID'];

	// mengambil angka atau bilangan dalam kode anggota terbesar,
	// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
	// misal 'BRG001', akan diambil '001'
	// setelah substring bilangan diambil lantas dicasting menjadi integer
	$noUrut = (int) substr($kode, 7, 7);

	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$noUrut++;

	// membentuk kode anggota baru
	// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
	// misal sprintf("%03s", 12); maka akan dihasilkan '012'
	// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
	$char = "NA";
    $newID = $char . sprintf("%07s", $noUrut);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PERORANGAN</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
</head>

<body>
		<header class="container-fluid fixed-top" style="background-color: #f0932b; position: absolute;">
			<div class="container">
			<a href="index.php"><img src="img/logo2.png" class="h_logo" alt="" title=""></a>
				<nav>
					<ul class="main_nav">
						<a> Pengaduan Perorangan </a>
					</ul>
				</nav>
			</div>
		</header>
		<br><br><br><br><br>

<form role="form" method="post" enctype="multipart/form-data">
		<table style="width: 100%;">
			<tr>
				<td style="vertical-align: top;">
					<div class="container-fluid" style="padding: 0px;">
						<div class="container bg-light col-6 p-5 rounded"  style="max-width: 100%;">
							<div class="form-group">
						        <label style="margin-bottom: 0px;">Nomor Aduan</label>
						        <input style="text-align: center;" class="form-control" type="text" readonly="" name="nomor_aduan" value="<?php echo $newID; ?>">
						            
						        <label style="margin-bottom: 0px; margin-top: 10px">Tanggal</label>       
						        <input style="text-align: center;" class="form-control" type="text" readonly="" name="tgl_aduan" value="<?php echo date("Y-m-d"); ?>">
							</div>
						</div>
					</div>
				</td>
				<td style="width: 40%; vertical-align: top;">
					<div class="container-fluid" style="padding: 0px;">
						<div class="container bg-light col-6 p-5 rounded"  style="max-width: 80%">
							<div class="form-group">
								<h3 style="text-align: center;">Identitas Perorangan</h3>
							    <label style="margin-bottom: 0px; margin-top: 30px;">Nama Lengkap</label>
							    <input type="text" class="form-control" name="Nama">

							    <label style="margin-bottom: 0px; margin-top: 10px;">NPM</label>
							    <input type="text" class="form-control" name="NPM">

							    <label style="margin-bottom: 0px; margin-top: 10px;">Email</label>
							    <input type="email" class="form-control" name="Email">

								<label style="margin-bottom: 0px; margin-top: 10px;">No HP</label>
							    <input type="text" class="form-control" name="Phone">
					  		</div>
					  	</div>
					</div>
				</td>

				<td style="vertical-align: top; width: 40%;">
					<div class="container-fluid" style="padding: 0px;">
						<div class="container bg-light col-6 p-5 rounded"  style="max-width: 80%;">
							<div class="form-group">
					  			<h3 style="text-align: center;  vertical-align: top;">Isi Aduan</h3>
							    <label style="margin-bottom: 0px; margin-top: 30px">Jenis Aduan</label>
							    <select name="jenis_aduan" class="form-control" required autocompleted="off">
							    	<option value="">Pilih Jenis Aduan</option> 
							        <?php while($data=mysqli_fetch_array($cek)){?>
									<option>
									<?php echo $data['jenis_aduan']; ?></option>
									<?php } ?>
							     </select>

							    <label style="margin-bottom: 0px; margin-top: 10px;">Isi Aduan</label>
							    <textarea rows="3" type="text" class="form-control" placeholder="Isi Aduan" name="Message" required autocompleted="off"></textarea>

								<label style="margin-bottom: 0px; margin-top: 10px;">Cara Penyampaian</label>
							    <select name="penyampaian" class="form-control" required autocompleted="off"> 
							        <option value="">Pilih Cara Penyampaian</option>
							        <?php while($data2=mysqli_fetch_array($cek2)){?>
									<option>
									<?php echo $data2['penyampaian']; ?></option>
									<?php } ?>
							     </select>

							    <label style="margin-bottom: 0px; margin-top: 10px;">Dokumen Pendukung</label>
							    <input style="padding: 3px" type="file" class="form-control" name="file">

							    <br><br>
								<center>
									<button type="submit" name="save" class="btn btn-primary btn-lg">SAVE</button>				
</form>
				<?php
                  if(isset($_POST['save']))
                    {
                      $nama     = $_FILES['file']['name'];
                      $lokasi   = $_FILES['file']['tmp_name'];
                      move_uploaded_file($lokasi, "../admin/File".$nama);
                      $koneksi->query("INSERT INTO daftar_aduan 
                              (nomor_aduan,tgl_aduan,Nama,NPM,Email,Phone,Message,Status,file) VALUES ('$_POST[nomor_aduan]','$_POST[tgl_aduan]','$_POST[Nama]','$_POST[NPM]','$_POST[Email]','$_POST[Phone]','$_POST[Message]','Pending','$nama')");
                    
                    echo "<script>alert('Aduan berhasil ditambahkan'); </script>";
                    echo "<script>location='tabeladuan.php'; </script>";

                    }

              	?>
								</center>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</table>
 