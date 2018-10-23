<?php 
// Mendapatkan id_produk dari url
session_start();
$id_produk = $_GET['id'];

//Jika sudah ada produk itu dikeranjang maka produk dijumlahkan +1
if (isset($_SESSION['keranjang'][$id_produk])) {
	# code...
	$_SESSION['keranjang'][$id_produk]+=1;
}
//selain itu (belum ada dikeranjang )maka produk dianggap di beli 1
else{
	$_SESSION['keranjang'][$id_produk] = 1;
}

// echo "<pre>";
// print_r(($_SESSION));
// echo "<pre>";

//Larikan ke halaman keranjang
echo "<script> alert('produk telah masuk ke keranjang');</script>";
echo "<script>location='keranjang.php';</script> "; 

 ?>