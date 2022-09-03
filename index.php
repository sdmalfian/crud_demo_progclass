<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dblatihan";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE progclass_perpustakaan set
											 	isbn = '$_POST[tisbn]',
											 	judul = '$_POST[tjudul]',
												pengarang = '$_POST[tpengarang]',
											 	penerbit = '$_POST[tpenerbit]'
											 WHERE id = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO progclass_perpustakaan (isbn, judul, pengarang, penerbit)
										  VALUES ('$_POST[tisbn]', 
										  		 '$_POST[tjudul]', 
										  		 '$_POST[tpengarang]', 
										  		 '$_POST[tpenerbit]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM progclass_perpustakaan WHERE id = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$visbn = $data['isbn'];
				$vjudul = $data['judul'];
				$vpengarang = $data['pengarang'];
				$vpenerbit = $data['penerbit'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM progclass_perpustakaan WHERE id = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD Perpustakaan Programming Class</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div style="background-image: url('header.jpg'); 
  	background-color:black; background-size: cover; height:300px; opacity: 90%">
		<h1 class="text-center" style="padding-top: 120px; color:white;">CRUD Perpustakaan PHP & MySQL </h1>
</div>
<div class="container">
	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Buku
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>ISBN (Max 11 Karakter)</label>
	    		<input type="text" name="tisbn" value="<?=@$visbn?>" class="form-control" placeholder="Input isbn buku disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Judul</label>
	    		<input type="text" name="tjudul" value="<?=@$vjudul?>" class="form-control" placeholder="Input judul buku disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Pengarang</label>
	    		<textarea class="form-control" name="tpengarang"  placeholder="Input pengarang buku disini!"><?=@$vpengarang?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>penerbit</label>
	    		<textarea class="form-control" name="tpenerbit"  placeholder="Input penerbit buku disini!"><?=@$vpenerbit?></textarea>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Buku
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>ISBN</th>
	    		<th>Judul</th>
	    		<th>Pengarang</th>
	    		<th>Penerbit</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from progclass_perpustakaan order by id desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['isbn']?></td>
	    		<td><?=$data['judul']?></td>
	    		<td><?=$data['pengarang']?></td>
	    		<td><?=$data['penerbit']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>