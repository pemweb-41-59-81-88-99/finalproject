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

	<section class="billboard">
		<header>
			<div class="wrapper">
				<a href="index.php"><img src="img/logo2.png" class="h_logo" alt="" title=""></a>
				<nav>
					<ul class="main_nav">
						<li class="current">Sistem Informasi Pengaduan</a></li>
						</ul>
				</nav>
			</div>
		</header>

		<section class="caption">
			<p class="cap_title">Sistem Informasi Pengaduan</p>
			<p class="cap_desc">Fakultas Ilmu Komputer</p>
			<button class="btn btn-light btn-lg" onclick="window.location.href='aduan.php'" >PENGADUAN</button>
			<button class="btn btn-light btn-lg" onclick="window.location.href='tabeladuan.php'" >LIHAT DAFTAR ADUAN</button>


		</section>
	</section><!-- Billboard End -->

	<section class="berita">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p class="cap_title2">Berita</p>
			</div>
		</div>
	
		
<div class="row">
		<?php
			$ambil = $koneksi->query("SELECT * FROM berita ");
			while($pecah=$ambil->fetch_assoc()) {
		?>
	<div class="col-md-4">
		<div class="card" style="width: 18rem;">
			<a href="berita.php?id=<?php echo $pecah['id_berita'] ?>"><img src="admin/Gambar/Berita/<?php echo $pecah['Gambar'];?>"></a>
			<div class="card-body">
			  <h4 class="card-title"><?php echo $pecah['Judul']; ?></h4>
			  <p class="card-text"><?php
									$long_string = $pecah['Ket'];
									$limited_string = limit_words($long_string, 10);
									echo $limited_string; echo '...';
									?>
									</p>
			<a href="berita.php?id=<?php echo $pecah['id_berita'] ?>"><p>Read More</p></a>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php
function limit_words($string, $word_limit){
	$words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));
}
?>
</section>	
	<footer>
		<p class="rights">© 2019 UPNJT 2019 - Sistem Informasi Pengaduan </p>
	</footer>

</body>
</html>