<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>DATA MAHASISWA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">DATA MAHASISWA</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Mahasiswa</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nim			= $_POST['nim'];
			$nama			= $_POST['nama'];
			$tempat_lahir	= $_POST['tempat_lahir'];
			$tanggal_lahir	= $_POST['tanggal_lahir'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jurusan		= $_POST['jurusan'];
			$batch			= $_POST['batch'];
			$email			= $_POST['email'];
			$address		= $_POST['address'];
			$handphone		= $_POST['handphone'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, jurusan, batch, email, address, handphone) VALUES('$nim', '$nama','$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$jurusan', '$batch', '$email', '$address', '$handphone')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
				<div class="col-sm-10">
					<input type="text" name="tempat_lahir" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
				<div class="col-sm-10">
					<input type="text" name="tanggal_lahir" class="form-control" placeholder="yyyy/mm/dd" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" required>
						<label class="form-check-label">LAKI-LAKI</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">PILIH JURUSAN</option>
						<option value="Information System">INFORMATION SYSTEM</option>
						<option value="Law">LAW</option>
						<option value="Accounting">ACCOUNTING</option>
						<option value="Management">MANAGEMENT</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">BATCH</label>
				<div class="col-sm-10">
					<input type="text" name="batch" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">EMAIL</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ADDRESS</label>
				<div class="col-sm-10">
					<input type="text" name="address" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HANDPHONE</label>
				<div class="col-sm-10">
					<input type="text" name="handphone" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tanggal_lahir").datetimepicker({dateformat : 'yyyy/mm/dd'});
		});
	</script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>
