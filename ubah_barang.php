<?php 
	require 'koneksi.php';

	$id_barang = $_GET['id_barang'];

	$tampil_barang= mysqli_query($kon, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
	$f_tampil_barang = mysqli_fetch_assoc($tampil_barang);

	if (isset($_POST['submit'])) {
		$nama_barang = $_POST['namaBarang'];

		$sql_ubah = mysqli_query($kon, "UPDATE barang SET nama_barang = '$nama_barang' WHERE id_barang = '$id_barang'");	

		if ($sql_ubah) {
			echo "
				<script>
					alert('Berhasil😊')
					document.location.href='barang.php'
				</script>
			";
			exit;
		}else{
			echo "
				<script>
					alert('Gagal😢')
					document.history.back()
				</script>
			";
			exit;
		}
	}
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Ubah Barang</title>
 </head>
 <body>
 	<form method="POST">
	 	<table>
	 		<tr>
	 			<td>Nama Barang</td>
	 			<td></td>
	 		</tr>
	 		<tr>
	 			<td><input type="text" name="namaBarang" required value="<?=$f_tampil_barang['nama_barang'];?>"></td>
	 			<td><input class="kirim" type="submit" name="submit"></td>
	 		</tr>
	 	</table>
 	</form>
 </body>
 </html>