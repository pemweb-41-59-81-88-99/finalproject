<?php
	session_start();
	error_reporting(0);

	include "pagination1.php";
	include "koneksi.php";

	#mengatur variabel reload dan sql
    if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
    #jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong) pakai ini
        $keyword=$_REQUEST['keyword'];
        $reload = "?pagination=true&keyword=$keyword";
        $sql =  "SELECT * FROM daftar_aduan WHERE Nama LIKE '%$keyword%' OR NPM LIKE '%$keyword%' OR status LIKE '%$keyword%'";
        $result = mysqli_query($koneksi, $sql);
    }else{
    #jika tidak ada pencarian pakai ini
        $reload = "?pagination=true";
        $sql =  "SELECT * FROM daftar_aduan WHERE Nama LIKE '%$keyword%' OR NPM LIKE '%$keyword%' OR status LIKE '%$keyword%' order by id_daftaraduan ASC";
    	$result = mysqli_query($koneksi, $sql);
    }
      
    #pagination config start
    $rpp = 10; // jumlah record per halaman
    $reload = "?pagination=true";
    $page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
    $tcount = mysqli_num_rows($result);
    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
    $count = 0;
    $i = ($page-1)*$rpp;
    $no_urut = ($page-1)*$rpp;
    //pagination config end

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar Tabel Aduan</title>
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

    	<!-- Bootstrap core CSS -->
        <link href="aset/css/bootstrap.min.css" rel="stylesheet">
 
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="aset/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
 
        <!-- Custom styles for this template -->
        <script src="aset/js/ie-emulation-modes-warning.js"></script>

</head>
<body style="background-color: #FF9933;">

		<header class="container-fluid fixed-top" style="background-color: #f0932b; position: absolute;">
			<div class="wrapper">
			<a href="index.php"><img src="img/logo2.png" class="h_logo" alt="" title=""></a>
				<nav>
					<ul class="main_nav">
						<h4>Tabel Aduan</h4>
					</ul>
				</nav>
			</div>
		</header>
		<br><br><br><br><br><br>

		<div class="row">
		    <div style="margin-left: 50px" class="col-md-8">
		 
		        <!--muncul jika ada pencarian (tombol reset pencarian)-->
		        <?php if ($_REQUEST['keyword']<>"") { ?>
		            <a class="btn btn-default btn-outline" href=""> Reset Pencarian</a>
		        <?php } ?>
		 
		    </div>
		 
		    <div class="col-md-3">
		        <form method="post" action="">
		            <div class="form-group input-group">
		                <input type="text" name="keyword" class="form-control" placeholder="Search..." value="<?php echo $_REQUEST['keyword']; ?>">
		                <span class="input-group-btn">
		                    <button class="btn btn-primary" type="submit">Cari
		                    </button>
		                </span>
		            </div>
		        </form>
		    </div>
		</div>

		<div class="container-fluid">
			<div class="container bg-light col-auto p-5 rounded">
				<table class="table table-hover">
					<thead>
						<h3>Daftar Perorangan</h3>
						<h5>Jumlah Aduan : 
							<?php 
								$urut= mysqli_query($koneksi, "select * from daftar_aduan");
								$urutan = mysqli_num_rows($urut);
								echo $urutan;
							?>
						</h5>
						<br>
					   	<tr style="text-align: center;">
					      <th class="text-center">Nomor Aduan</th>
					      <th class="text-center">NPM</th>
					      <th class="text-center">Nama</th>
					      <th class="text-center">Pesan</th>
					      <th class="text-center">Status</th>
					      <th class="text-center"></th>
					      <th class="text-center"></th>
					    </tr>
					  </thead>
					  <tbody>
					<?php
					    while(($count<$rpp) && ($i<$tcount)){
					    	mysqli_data_seek($result,$i);
                            $data = mysqli_fetch_array($result);
					    ?>
					    <form method="get" action="edit.php">
					    	<tr style="text-align: center;">
					      		<th class="text-center"><?php echo $data['nomor_aduan']; ?></th>
					      		<td class="text-center"><?php echo $data['NPM']; ?></td>
					      		<td class="text-center"><?php echo $data['Nama']; ?></td>
							    <td class="text-center"><?php echo $data['Message']; ?></td>
							    <td class="text-center"><?php echo $data['Status']; ?></td>
							    <td class="text-center"><a href="lihat.php?id=<?php echo $data['id_daftaraduan']; ?>">( Lihat )</a></td>
					    	</tr>
						</form>
					<?php
						$i++; 
                        $count++;
						}
					?>
					  </tbody>
					</table>
					<div class="text-center"><?php echo paginate_one($reload, $page, $tpages); ?></div>
				</div>
			</div>
			<br>

	<br><br><br>
	<footer>
		<p class="rights">© 2019 UPNJT 2019 - Sistem Informasi Pengaduan </p>
	</footer>

</body>
</html>