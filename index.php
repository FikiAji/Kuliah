<?php 
require 'koneksi.php';
// cek sudah login atau belum
if (isset($_SESSION['id'])) {
	header("Location: home.php");
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<style type="text/css">
		 body{
		 	margin: 0;
		 }
		 
		.container{
			display: flex;
			justify-content: center;
			align-items: center;
			margin: 0;
			height: 100vh;
			background: #C5FDD0;
		}

		.content{
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
			flex-direction: column;
		}

		.content input{
			display: flex;
			width: 250px;
			height: 30px;
			border-radius: 10px;
			border: none;
			background: #78FF93;
			text-align: left;
			padding: 10px;
			margin: 30px;
			color: #505050;
		}

		.content .btn{
			display: flex;
			justify-content: center;
			padding: 0;
			width: 270px;
			height: 30px;
			border-radius: 10px;
			border: none;
			background: #04933B;
			align-items: center;
			color: white;
			font-weight: bold;
			margin: 30px;
			cursor: pointer;
		}

		.content .content-atas {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: row;
			padding: 10px;
			margin-top: 20px;
		}

		.content-atas .kiri{
			display: flex;
			width: 180px;
			height: 5px;
			background: #04933B;
			border-radius: 10px;
			margin-top: 36px;
		}
		.content-atas .tengah{
			display: flex;
			justify-content: center;
			align-items: center;
			width: 80px;
			height: 50px;
		}
		.content-atas .kanan{
			display: flex;
			width: 180px;
			height: 5px;
			background: #04933B;
			border-radius: 10px;
			margin-top: 36px;
		}

		.content .btn: hover{
			background: #;
		}

		.content .login{
			display: flex;
			color: #04933B;
			padding-bottom: 5px;
			font-weight: bold;
			font-size: 25px;
		}

		.content .raja{
			font-family: Arial;
			color: #04933B;
			font-size: 25px;
		}

		.content .regis{
			color: #04933B;
		}
	</style>
</head>
<body>
	<div class="container">

		<div class="content">			
		<label class="login">LOGIN</label>
		<label class="raja">RAJA DAUN</label>
		<div class="content-atas">
			<div class="kiri"></div>
			<div class="tengah"><img src="images/logo-green.png" width="60px"></div>
			<div class="kanan"></div>
		</div>
		<form method="POST" action="auth.php">
			<input type="text" name="user" placeholder="username" style="outline: none;">
			<input type="password" name="pass" placeholder="password" style="outline: none;">
			<input class="btn" type="submit" name="submit" style="outline: none;">
		</form>
		<a href="register.php" class="regis">Register</a>
		</div>
	</div>

</body>
</html>