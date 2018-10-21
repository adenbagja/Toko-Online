<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]' ");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Nama Produk</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?> ">
 	</div>
 	<div class="form-group">
 		<label>Harga Produk</label>
 		<input type="text" name="harga" class="form-control" value=" <?php echo $pecah['harga_produk']; ?> ">
 	</div>
 	<div class="form-group">
 		<label>Berat Produk</label>
 		<input type="text" name="berat" class="form-control" value=" <?php echo $pecah['berat_produk']; ?> ">
 	</div>
 	<div class="form-group">
 		<label>Foto Produk</label><br>
 		<img src="../db_foto/<?php echo $pecah['foto_produk'];?>  " width="200px">
 		<input type="file" name="foto" class="form-control">
 	</div>
 	<div class="form-group">
 		<label>Deskripsi</label>
 		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
 	</div>
 	
 	<button class="btn btn-primary"  name="ubah">ubah</button>

 </form>

 <?php 
if (isset($_POST['ubah'])) {
	# code...
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	//jika foto dirubah
	if (!empty($lokasifoto)) {
		# code...
		move_uploaded_file($lokasifoto, "../db_foto/$namafoto");

		$koneksi ->query("UPDATE  produk SET nama_produk = '$_POST[nama]',
			harga_produk = '$_POST[harga]', berat_produk = '$_POST[berat]', 
			foto_produk = '$namafoto', deskripsi_produk = '$_POST[deskripsi]'
			WHERE id_produk = '$_GET[id]'");
	}
	else{
		$koneksi ->query("UPDATE produk SET nama_produk = '$_POST[nama]',
			harga_produk = '$_POST[harga]', berat_produk = '$_POST[berat]', 
			 deskripsi_produk = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
	}

	echo "<script>alert('Data berhasil di ubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script> ";
}
  ?>