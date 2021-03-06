<?php include('koneksi.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
	
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Data Produk</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nama_produk	= $_POST['nama_produk'];
			$keterangan		= $_POST['keterangan'];
			$harga			= $_POST['harga'];
			$jumlah			= $_POST['jumlah'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO produk(nama_produk, keterangan, harga, jumlah) VALUES('$nama_produk', '$keterangan', '$harga', '$jumlah')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="add.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="add.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA</label>
				<div class="col-sm-10">
					<input type="text" name="nama_produk" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KETERANGAN</label>
				<div class="col-sm-10">
					<input type="text" name="keterangan" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HARGA</label>
				<div class="col-sm-10">
					<input type="text" name="harga" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JUMLAH</label>
				<div class="col-sm-10">
					<input type="text" name="jumlah" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
	
</body>
</html>