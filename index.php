<?php 
session_start();
//koneksi ke databases
include 'config/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Toko Online</title>
	<link rel="stylesheet" href="css/bootstrap4.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Tokoku</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="keranjang.php">Keranjang</a>
				</li>
				<!-- Jika sudah login maka --> 
				 <?php if (isset($_SESSION['pelanggan'])): ?>
					<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
					<?php else: ?>
						<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>	
					<?php endif ?>
				<li class="nav-item">
					<a class="nav-link" href="checkout.php">Checkout</a>
				</li>
			</ul>
		</div>
	</nav>


	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/pexels-photo-219598.jpeg" alt="img1">
       <div class="carousel-caption d-none d-md-block">
        <h1>BEST WINTER COLLECTION</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
         <button class="btn btn-info btn-lg">Shop Now</button>
       </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/pexels-photo-573271.jpeg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1>BEST WINTER COLLECTION2</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
         <button class="btn btn-info btn-lg">Shop Now</button>
       </div>
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- 
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<!-- Jika sudah login maka -->
				<!-- <?php if (isset($_SESSION['pelanggan'])): ?>
					<li><a href="logout.php">Logout</a></li>
					<?php else: ?>
						<li><a href="login.php">Login</a></li>	
					<?php endif ?>
					<li><a href="checkout.php">Checkout</a></li>
				</ul>
			</div> -->
		<!-- </nav> --> 

		<!-- Konten -->
		<section class="konten">
			<div class="container">
				<h1>Produk Terbaru</h1>

				<div class="row">

					<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
					<?php while ($perproduk = $ambil->fetch_assoc()){ ?>
						<div class="col-md-3">
							<div class="thumbnail">
								<img src="db_foto/<?php echo $perproduk['foto_produk']; ?>" width="200" height="40"   >
								<div class="caption">
									<h3><?php echo $perproduk['nama_produk'] ?></h3>
									<h5>Rp. <?php echo $perproduk['harga_produk'] ?></h5>
									<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?> " class="btn btn-primary">Beli</a>
								</div>
							</div>	
						</div>
					<?php } ?>
				</div>
			</div>
		</section>

		<footer>
			<div class="container-fluid pt-5 pb-5 bg-dark text-light">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="row">
								<h5>Meta</h5>
							</div>
							<div class="row mb-4">
								<div class="underline bg-light" style="width: 50px;"></div>
							</div>

							<p><i class="fa fa-chevron-right" aria-hidden="true"></i> Register</p>
							<p><i class="fa fa-chevron-right" aria-hidden="true"></i> Log In</p>
							<p><i class="fa fa-chevron-right" aria-hidden="true"></i> Enter RSS</p>
							<p><i class="fa fa-chevron-right" aria-hidden="true"></i> Comments RSS</p>
							<p><i class="fa fa-chevron-right" aria-hidden="true"></i> Webseotips</p>

						</div>


						<div class="col-md-3">
							<div class="row">
								<h5>Recent Posts</h5>
							</div>
							<div class="row mb-4">
								<div class="underline bg-light" style="width: 50px;"></div>
							</div>
							<div class="row">
								<div class="media">
									<img src="img/b1.jpg" class="img-fluid" alt="media-image">
									<div class="media-body ml-2">
										<h6>Jackets For The Soul. What Color Is Yours?</h6>
									</div>
								</div>
							</div>

							<div class="row mt-3">
								<div class="media">
									<img src="img/b2.jpg" class="img-fluid" alt="media-image">
									<div class="media-body ml-2">
										<h6>Best Fabrics For Your Dream Dress!</h6>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 pl-4">
							<div class="row">
								<h5>About</h5>
							</div>
							<div class="row mb-4">
								<div class="underline bg-light" style="width: 50px;"></div>
							</div>
							<div class="row">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel inventore quis harum mollitia ex esse obcaecati deserunt alias fuga quia.<br>Vel inventore quis harum mollitia.</p>
							</div>
						</div>

						<div class="col-md-3">
							<div class="row">
								<h5>Tags</h5>
							</div>
							<div class="row mb-4">
								<div class="underline bg-light" style="width: 50px;"></div>
							</div>
							<button class="btn btn-outline-light">Autunm</button> <button class="btn btn-outline-light">Dress</button> <button class="btn btn-outline-light">Fashion</button> <button class="btn btn-outline-light">Ladice Dress</button> <button class="btn btn-outline-light">Black Dress</button>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	</body>
	</html>