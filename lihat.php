<!DOCTYPE html>
<html lang="en">
<head>
	<title>ADUAN</title>
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
					<h4>Aduan</h4>
				</ul>
			</nav>
		</div>
	</header>
	
	<br><br><br><br><br>
					
	<div class="container-fluid" style="padding: 0px;">
		<div class="container bg-light col-6 p-5 rounded"  style="max-width: 50%">
			<div class="form-group">
				<?php
				include "koneksi.php";

				$id = $_GET['id'];

				$query = mysqli_query($koneksi, "SELECT * FROM daftar_aduan WHERE id_daftaraduan = '$id'");

				while($data = mysqli_fetch_array($query)){
				?>
				<form action="tabeladuan.php" method="post">		
					<h3 style="text-align: center;">Isi Aduan</h3>
					<label style="margin-bottom: 0px; margin-top: 30px;">Nama Lengkap</label>
					<input type="hidden" class="form-control" name="id_daftaraduan" value="<?php echo $data['id_daftaraduan'] ?>">
					<input type="text" class="form-control" readonly="" name="Nama" value="<?php echo $data['Nama'] ?>">

					<label style="margin-bottom: 0px; margin-top: 10px;">NPM</label>
					<input type="text" class="form-control" readonly="" name="NPM" value="<?php echo $data['NPM'] ?>">

					<label style="margin-bottom: 0px; margin-top: 10px;">Email</label>
					<input type="text" class="form-control" readonly="" name="Email" value="<?php echo $data['Email'] ?>">
					
					<label style="margin-bottom: 0px; margin-top: 10px;">Nomor HP</label>
					<input type="text" class="form-control" readonly="" name="Nomor HP" value="<?php echo $data['Phone'] ?>">
						  			
				    <label style="margin-bottom: 0px; margin-top: 10px;">Isi Aduan</label>
					<textarea rows="3" type="text" class="form-control" readonly="" name="Message" ><?php echo $data['Message'] ?></textarea>

					<br><br>
					
					<label style="margin-bottom: 0px; margin-top: 10px;">Balasan :</label>
					<textarea rows="3" type="text" class="form-control" readonly="" name="Respon" ><?php echo $data['Respon'] ?></textarea>

					<br><br>
									
					<center>
						<button type="submit" class="btn btn-primary btn-lg">KEMBALI</button>
					</center>
				</form>
				<?php } ?>

			</div>
		</div>
	</div>
</body>