<?php 
session_start();
include 'config/config.php';

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
	echo "<script>alert('Keranjang masih kosong, Silahkan belanja terlebih dahulu');</script>";	
	echo "<script>location='index.php';</script>";
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Kerangjang belanja</title>
 	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
 </head>
 <body>

	<!-- Navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<!-- Jika sudah login maka -->
				<?php if (isset($_SESSION['pelanggan'])): ?>
					<li><a href="logout.php">Logout</a></li>
				<?php else: ?>
					<li><a href="login.php">Login</a></li>	
				<?php endif ?>
				<li><a href="checkout.php">Checkout</a></li>
			</ul>
		</div>
	</nav>




<section class="konten">
	<div class="container">
		<h1>Keranjang belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor = 1;  ?>
				 <?php if (isset($_SESSION['keranjang'])): ?>
					
				
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):  ?>
						<!-- Menampilkan produk yg sedang dipereulangkan -->
						<?php  
						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk' ");
						$pecah = $ambil ->fetch_assoc();
						$subharga = $pecah["harga_produk"]* $jumlah;
						
						?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_produk']; ?> </td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td><?php echo number_format($subharga); ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php endforeach ?>
				<?php endif ?>
				

			</tbody>
			
		</table>
		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-danger">Checkoutz</a>
	</div>
</section>
 
 </body>
 </html>


 	
 