<?php 
session_start();
$koneksi = new mysqli("localhot", "root", "", "a");
 ?>

 //jika tidak ada session login maka redirect ke login.php
 <?php if (!isset($_SESSION["pelanggan"])): ?>
 	<?php echo <script>alert('Silahkan login');</script> ?>;
 	<?php echo <script>location='login.php';</script> ?>;
 <?php endif ?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
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
				<li><a href="logib.php">Login</a></li>
				<li><a href="checkout.php">Checkout</a></li>
			</ul>
		</div>
	</nav>

<pre>
	<?php print_r($_SESSION['pelanggan']); ?>
</pre>

</body>
</html>