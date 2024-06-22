<?php 
	require 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Barang</title>
	<style type="text/css">
		.container{
			display: flex;
			flex-direction: column;
		  	margin-left: 130px; /* Memberi ruang pada konten di samping header */
		  	padding: 20px;
		}

		.content{
			background: white;
			margin-top: 30px;
			border-radius: 10px;
			padding: 10px;
			box-shadow: 2px 2px 12px -2px rgba(0,0,0,0.66);
			-webkit-box-shadow: 2px 2px 12px -2px rgba(0,0,0,0.66);
			-moz-box-shadow: 2px 2px 12px -2px rgba(0,0,0,0.66);
		}

		.judul{
			display: flex;
			flex-direction: row;
			align-items: center;
			min-height: 60px;
			background: #C5FDD0;
			border-radius: 10px;
		}

		.judul .kiri{
			display: flex;
			min-width: 30%;
			justify-content: flex-start;
		}

		.judul .kiri label{
			color: #00481D;
			font-size: 20px;
			font-family: Arial;
			font-weight: bold;
			margin-left: 30px;
		}

		.judul .kanan{
			display: flex;
			min-width: 70%;
			flex-direction: row;
			align-items: center;
			justify-content: flex-end;
			font-family: Arial;
			font-weight: bold;
			font-size: 14px;
			color: #00481D;
		}

		.judul .kanan .luar{
			display: flex;
			justify-content: center;
			flex-direction: column;
			align-items: center;
			min-width: 100px;
			min-height: 65px;
			padding: 5px;
			margin: 0px 10px;
		}

		.kanan .luar .dalam{
			display: flex;
			justify-content: center;
			align-items: center;
			background: white;
			min-width: 140px;
			min-height: 40px;
			border-radius: 5px;
			font-size: 16px;
			margin-top: 3px;
			color: #007A31;
		}

		.content-2{
			background: white;
			margin-top: 30px;
			border-radius: 10px;
			padding: 10px;
			box-shadow: 2px 2px 12px -2px rgba(0,0,0,0.66);
			-webkit-box-shadow: 2px 2px 12px -2px rgba(0,0,0,0.66);
			-moz-box-shadow: 2px 2px 12px -2px rgba(0,0,0,0.66);
		}
	</style>
</head>
<body style="margin: 0; padding: 0;">
	<?php include 'header.php'; ?>
	<div class="container">
		<label style="font-size: 30px;">Barang</label>
		<div class="content">
			<div class="judul">
				<div class="kiri">
					<label>Data Barang</label>
				</div>
			</div>
				
				<a href="input_barang.php" class="btntambah">Tambah Barang</a>
				<?php 
					$sql = mysqli_query($kon, "SELECT * FROM barang ORDER BY nama_barang ASC");
				 ?>
				<table>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Stok</th>
						<th class="act">Action</th>
					<?php $i=1; while ($tampil=mysqli_fetch_assoc($sql)) { ?>
					<tr>
						<td><?=$i; ?></td>
						<td><?= $tampil['nama_barang']?></td>
						<td><?= $tampil['stok']?></td>
						<td class="act">
							<a href="ubah_barang.php?id_barang=<?=$tampil['id_barang']  ?>" class="btnubah">Ubah</a> |
							<a href="hapus_barang.php?id_barang=<?=$tampil['id_barang']  ?>" onclick="return confirm('yakin ingin menghapus data?')" class="btnhapus">Hapus</a>
						</td>
					</tr>
					<?php $i++; } ?>
				</table>
				
			
		</div><!-- end content -->

		<div class="content-2">
			<div class="judul">
				<div class="kiri">
					<label>Data Barang Masuk Terbaru</label>
				</div>
				<?php 
					$totalBarangMasuk = mysqli_query($kon, "SELECT SUM(total_harga) AS sumTotalHarga, SUM(jumlahLipat) AS sumJumlah FROM input_barang");
					$f_totalBarangMasuk = mysqli_fetch_assoc($totalBarangMasuk);
					$hargaSatuanBarang = number_format($f_totalBarangMasuk['sumTotalHarga'], 0, ',', '.');
					$jmlTrsBarang = number_format($f_totalBarangMasuk['sumJumlah'], 0, ',', '.');

					$stok_nangka = mysqli_query($kon, "SELECT SUM(jumlahKg) AS stok_nangka FROM barang INNER JOIN input_barang ON barang.id_barang = input_barang.id_barang WHERE nama_barang = 'Nangka'");
					$f_stok_nangka = mysqli_fetch_assoc($stok_nangka);
				?>
				<div class="kanan">
					<div class="luar">
						<label>Total Harga</label>
						<div class="dalam"><label>Rp <?=$hargaSatuanBarang ?></label></div>
					</div>
					<div class="luar">
						<label>Total Daun Pisang</label>
						<div class="dalam"><label><?=$jmlTrsBarang ?> lipat</label></div>
					</div>
					<div class="luar">
						<label>Total Nangka</label>
						<div class="dalam"><label><?=$f_stok_nangka['stok_nangka'] ?> kg</label></div>
					</div>
				</div>
			</div>
			<a href="input_transaksi_barang.php" class="btntambah">Tambah Transaksi Barang</a>
				<table>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Nama Supplier</th>
						<th>/koli</th>
						<th>/Lipat</th>
						<th>/Kg</th>
						<th>Harga Satuan</th>
						<th>Total harga</th>
						<th>Tanggal Masuk</th>
						<th class="act">Action</th>
					</tr>
					<?php 
						$no=1;
						$trs_brg = mysqli_query($kon, "SELECT * FROM barang INNER JOIN input_barang ON barang.id_barang = input_barang.id_barang INNER JOIN supplier ON input_barang.id_supplier = supplier.id_supplier ORDER BY tanggal_masuk DESC LIMIT 5");

						while ($f_brg = mysqli_fetch_assoc($trs_brg)) { 
							
							$hargaSatuanBarang = number_format($f_brg['harga_satuan'], 0, ',', '.');
							$totalHargaBarang = number_format($f_brg['total_harga'], 0, ',', '.');
					?>
					<tr>
						<td><?= $no;?></td>
						<td><?= $f_brg['nama_barang'];?></td>
						<td><?= $f_brg['nama_supplier'];?></td>
						<td><?= $f_brg['jumlahKoli'];?></td>
						<td><?= $f_brg['jumlahLipat'];?></td>
						<td><?= $f_brg['jumlahKg'];?></td>
						<td><?= $hargaSatuanBarang?></td>
						<td><?= $totalHargaBarang?></td>
						<td><?= $f_brg['tanggal_masuk'];?></td>
						<td>
							<a href="ubah_transaksi_barang.php?id_input_barang=<?= $f_brg['id_input_barang']?>&jumlahLipat=<?= $f_brg['jumlahLipat']?>&jumlahKg=<?= $f_brg['jumlahKg']?>&id_barang=<?= $f_brg['id_barang']?>" class="btnubah">Ubah</a> |

							<a href="hapus_transaksi_barang.php?id_input_barang=<?= $f_brg['id_input_barang']?>&id_barang=<?= $f_brg['id_barang']?>&jumlahLipat=<?= $f_brg['jumlahLipat']?>&jumlahKg=<?= $f_brg['jumlahKg']?>" onclick="return confirm('yakin ingin menghapus data?')" class="btnhapus">Hapus</a>
						</td>
					</tr>
					<?php 
						$no++; 
						} 
					?>

					
				</table>
		</div>

	</div>
</body>
</html>