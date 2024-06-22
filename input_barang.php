<?php 
	require 'koneksi.php';

    if (isset($_POST['submit'])) {
        $nama_barang = $_POST['nmBarang'];

        $sql_input = mysqli_query($kon, "INSERT INTO barang VALUES ('','$nama_barang','')");

        if ($sql_input) {
            echo"
                <script>
                    alert('Data berhasil masuk')
                    document.location.href='barang.php'
                </script>
            ";
            exit;
        }else{
            echo"
                <script>
                    alert('Data gagal masuk')
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
 	<title>Input Barang</title>
    <style type="text/css">
        .container{
            display: flex;
            justify-content: center;
            margin-left: 130px; /* Memberi ruang pada konten di samping header */
            padding: 20px;
        }

        .content-utama{
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 500px;
            padding: 10px;
        }

        .content-utama .kirim{
            width: 100px;
            background: #0865B9;
            color: white;
            font-weight: bold;
        }

        .content-utama .kirim:hover{
            background: #055196;
            cursor: pointer;
            transition: 0.3s;
        }

        .content-atas{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 30px;
            min-height: 50px;
            background: #04933B;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .content-atas label{
            font-size: 20px;
            color: white;
            font-weight: bold;
        }

        .content-bawah{
            display: flex;
            justify-content: center;
            align-items: center;
            background: #C5FDD0;
            padding: 30px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .content-bawah .td{
            padding: 0px 30px 5px 30px;
        }

        .content-bawah input{
            width: 180px;
            height: 40px;
            border-radius: 10px;
            border: none;
            text-align: center;
            margin-bottom: 20px;
        }        
    </style>
 </head>
 <body style="margin: 0; padding: 0;">
 	<?php include 'header.php'; ?>
    <div class="container">
        <div class="content-utama">
            <div class="content-atas">
                <label>Tambah Data Barang</label>
            </div>
            <div class="content-bawah">
                <form method="POST">
                    <table style="text-align: center; font-family: Arial; font-weight: bold; color: green;">
                        <tr style="background: none;">
                            <td class="td">Nama Barang</td>
                            <td class="td"></td>
                        </tr>
                        <tr style="background: none;">
                            <td class="td">
                                <input type="text" name="nmBarang">
                            </td>
                            <td class="td"><input class="kirim" type="submit" name="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    

 </body>
 </html>