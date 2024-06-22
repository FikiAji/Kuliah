<?php 
	require 'koneksi.php';

	$id_barang = $_GET['id_barang'];

	$sql_hapus=mysqli_query($kon,"DELETE FROM barang WHERE id_barang = '$id_barang'");

	if ($sql_hapus) {
				echo "
					<script>
						alert('Berhasil😊')
						document.location.href='home.php'
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
 ?>