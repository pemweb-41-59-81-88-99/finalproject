<?php
	include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIADU FASILKOM UPN VETERAN JAWA TIMUR</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <!--Libraries  -->
	<link href="lib/venobox/venobox.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

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
					
				<?php
				include "koneksi.php";

				$id = $_GET['id'];

				$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita = '$id'");

				while($data = mysqli_fetch_array($query)){
				?>
				<form action="index.php" method="post">
					<input type="hidden" class="form-control" name="id_daftaraduan" value="<?php echo $data['id_berita'] ?>">
					<img src="admin/Gambar/Berita/<?php echo $data['Gambar']; ?>" style="width: 40%; margin-left: auto; margin-right: auto; display: block " >   
					<h3 style="text-align: center; margin-right: 20%; margin-left: 20%;"><?php echo $data['Judul'] ?></h3>
					<p><?php echo $data['Ket'] ?></p>
					<center>
						<button type="submit" class="btn btn-primary btn-lg">KEMBALI</button>
					</center>
					<br>
				</form>
				<?php } ?>
			</body>
</html>