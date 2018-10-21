<?php 
session_start();
$koneksi = new mysqli("localhost", "root", "", "e-commerce");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootsrap.css">
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

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Login Pelanggan</h3>
					</div>
					<div class="panel-body">
						<form class="post">
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-control">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<button class="btn btn-primary" name="login">login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
//jk tombol login ditakan 
if (isset($_POST["login"])) 
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	//lakukan pengecekan akun
	$ambil = $koneksi ->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan = '$password' ");

	//ngitung akun yg terambil
	$akunyangcocok = $ambil->num_rows;

	//jika 1 akun yg cocok, makan diloginkan
	if ($akunyangcocok == 1) {
		//anda sukses login
		//mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		//login di session pelanggan
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('anda sukses login');</script>";
		echo "<script>location='checkout.php';</script>";
	}
	else{
		//jika anda gagal
		echo "<script>alert('anda gagal login, Email atau Password Salah');</script>";
		echo "<script>location='login.php';</script>";;
	}

}
 ?>

</body>
</html>